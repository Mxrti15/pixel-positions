<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Muestra una lista de los trabajos disponibles.
     * Se obtienen los trabajos más recientes junto con sus empleadores y etiquetas,
     * luego se agrupan por si son destacados o no.
     */
    public function index()
    {
        // Obtiene los trabajos más recientes con sus relaciones y los agrupa por "featured" (destacados o no)
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        // Retorna la vista con los trabajos normales, destacados y todas las etiquetas disponibles
        return view('jobs.index', [
            'jobs' => $jobs[0] ?? [], // Trabajos no destacados
            'featuredJobs' => $jobs[1] ?? [], // Trabajos destacados
            'tags' => Tag::all(), // Todas las etiquetas disponibles
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo trabajo.
     */
    public function create()
    {
        // Retorna la vista del formulario de creación de trabajo
        return view('jobs.create');
    }

    /**
     * Almacena un nuevo trabajo en la base de datos.
     *
     * @param Request $request Datos del formulario de creación de trabajo.
     */
    public function store(Request $request)
    {
        // Valida los datos ingresados en el formulario
        $attributes = $request->validate([
            'title' => ['required'], // El título del trabajo es obligatorio
            'salary' => ['required'], // El salario es obligatorio
            'location' => ['required'], // La ubicación es obligatoria
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])], // El horario debe ser "Part Time" o "Full Time"
            'url' => ['required', 'active_url'], // La URL debe ser válida y activa
            'tags' => ['nullable'], // Las etiquetas son opcionales
        ]);

        // Define si el trabajo es destacado o no, basado en el checkbox "featured"
        $attributes['featured'] = $request->has('featured');

        // Crea un nuevo trabajo asociado al empleador autenticado, excluyendo las etiquetas
        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        // Si se proporcionaron etiquetas, se asocian al trabajo
        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag); // Asigna la etiqueta al trabajo
            }
        }

        // Redirige a la página principal después de crear el trabajo
        return redirect('/');
    }
}
