<x-layout>
    <!-- Componente que proporciona el layout común para la página. Envuelve todo el contenido en la estructura definida para la aplicación. -->

    <x-page-heading>Results</x-page-heading>
    <!-- Componente que genera un encabezado con el texto "Results", indicando que esta página muestra los resultados de la búsqueda o alguna lista de trabajos. -->

    <div class="space-y-6">
        <!-- Contenedor con espaciado vertical entre los elementos de 6 unidades. -->

        @foreach($jobs as $job)
            <!-- Iteración sobre la colección de trabajos (pasados desde el controlador) para mostrar cada trabajo en la lista. -->
            
            <x-job-card-wide :$job />
            <!-- Componente que genera una tarjeta de trabajo expandida (ancha) para cada trabajo en la colección 'jobs'. Se pasa el trabajo a través de un binding de datos con ':$job'. -->
        @endforeach
    </div>
</x-layout>
