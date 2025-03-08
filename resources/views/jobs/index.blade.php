<x-layout>
    <!-- Componente que proporciona el layout común para la página. Envuelve todo el contenido en la estructura definida para la aplicación. -->

    <div class="space-y-10">
        <!-- Div contenedor con clase de espaciado (espaciado vertical de 10 unidades) para separar secciones. -->
        
        <section class="text-center pt-6">
            <!-- Sección centrada de texto, con un espaciado en la parte superior de 6 unidades. -->
            
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>
            <!-- Título de la página, en negrita y con un tamaño de fuente de 4xl (extra grande), mostrando el texto "Let's Find Your Next Job". -->

            <x-forms.form action="/search" class="mt-6">
                <!-- Componente de formulario, configurado para enviar los datos a la ruta '/search'. El formulario tiene un margen superior de 6 unidades. -->
                
                <x-forms.input :label="false" name="q" placeholder="Web Developer..." />
                <!-- Componente de entrada para el campo de búsqueda, sin etiqueta (label="false"), con el nombre 'q' y el texto de marcador de posición "Web Developer...". -->
            </x-forms.form>
        </section>

        <section class="pt-10">
            <!-- Sección con un espaciado superior de 10 unidades. -->
            
            <x-section-heading>Featured Jobs</x-section-heading>
            <!-- Componente que genera un encabezado de sección con el texto "Featured Jobs". -->

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <!-- Contenedor con una cuadrícula (grid) que se adapta a 3 columnas en pantallas grandes ('lg:grid-cols-3') y un espacio entre elementos de 8 unidades. -->
                
                @foreach($featuredJobs as $job)
                    <!-- Iteración sobre la colección de trabajos destacados. -->
                    
                    <x-job-card :$job />
                    <!-- Componente que genera una tarjeta de trabajo para cada trabajo destacado. -->
                @endforeach
            </div>
        </section>

        <section>
            <!-- Sección para mostrar las etiquetas. -->
            
            <x-section-heading>Tags</x-section-heading>
            <!-- Encabezado de la sección "Tags". -->

            <div class="mt-6 space-x-1">
                <!-- Contenedor con un margen superior de 6 unidades y espaciado horizontal entre elementos de 1 unidad. -->
                
                @foreach($tags as $tag)
                    <!-- Iteración sobre la colección de etiquetas. -->
                    
                    <x-tag :$tag />
                    <!-- Componente que genera una tarjeta o visualización para cada etiqueta. -->
                @endforeach
            </div>
        </section>

        <section>
            <!-- Sección para mostrar los trabajos recientes. -->
            
            <x-section-heading>Recent Jobs</x-section-heading>
            <!-- Encabezado de la sección "Recent Jobs". -->

            <div class="mt-6 space-y-6">
                <!-- Contenedor con un margen superior de 6 unidades y espaciado vertical entre elementos de 6 unidades. -->
                
                @foreach($jobs as $job)
                    <!-- Iteración sobre la colección de trabajos recientes. -->
                    
                    <x-job-card-wide :$job />
                    <!-- Componente que genera una tarjeta de trabajo ampliada (ancha) para cada trabajo reciente. -->
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
