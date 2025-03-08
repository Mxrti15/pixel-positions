<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Maneja la búsqueda de trabajos basada en el término de búsqueda ingresado.
     *
     * @return \Illuminate\View\View Retorna la vista con los resultados de la búsqueda.
     */
    public function __invoke()
    {
        // Obtiene los trabajos que coinciden con el término de búsqueda en el título
        $jobs = Job::query()
            ->with(['employer', 'tags']) // Carga las relaciones de empleador y etiquetas
            ->where('title', 'LIKE', '%' . request('q') . '%') // Filtra los trabajos por coincidencia en el título
            ->get(); // Obtiene los resultados de la consulta

        // Retorna la vista de resultados con los trabajos encontrados
        return view('results', ['jobs' => $jobs]);
    }
}
