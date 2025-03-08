<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Muestra los trabajos asociados a una etiqueta específica.
     *
     * @param Tag $tag Instancia de la etiqueta seleccionada.
     * @return \Illuminate\View\View Retorna la vista con los trabajos filtrados por etiqueta.
     */
    public function __invoke(Tag $tag)
    {
        // Carga los trabajos asociados a la etiqueta junto con sus relaciones de empleador y etiquetas
        return view('results', ['jobs' => $tag->jobs->load(['employer', 'tags'])]);
    }
}
