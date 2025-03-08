<x-layout>
    <!-- Componente personalizado que proporciona el layout (plantilla) para la página.
         Sirve para envolver todo el contenido de la página con la estructura común definida en el layout. -->

    <x-page-heading>New Job</x-page-heading>
    <!-- Componente que genera un encabezado con el texto "New Job", típicamente usado como el título principal de la página. -->

    <x-forms.form method="POST" action="/jobs">
        <!-- Componente que genera un formulario con el método HTTP POST y la acción '/jobs', 
             lo que indica que los datos se enviarán a esa ruta para ser procesados. -->

        <x-forms.input label="Title" name="title" placeholder="CEO" />
        <!-- Componente que genera un campo de entrada para el título del trabajo.
             El 'label' muestra el texto "Title", 'name' es el nombre del campo y 'placeholder' es el texto que aparece dentro del campo, indicando un ejemplo de valor como "CEO". -->

        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD" />
        <!-- Componente que genera un campo de entrada para el salario del trabajo.
             'label' muestra "Salary", 'name' es el nombre del campo y 'placeholder' da un ejemplo de salario, "$90,000 USD". -->

        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida" />
        <!-- Componente que genera un campo de entrada para la ubicación del trabajo.
             'label' muestra "Location", 'name' es el nombre del campo y 'placeholder' proporciona un ejemplo de ubicación, "Winter Park, Florida". -->

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>
        <!-- Componente que genera un menú desplegable (select) para elegir el horario del trabajo.
             'label' muestra "Schedule", 'name' es el nombre del campo, y dentro del select, las opciones "Part Time" y "Full Time" son seleccionables. -->

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted" />
        <!-- Componente que genera un campo de entrada para la URL de la oferta de trabajo.
             'label' muestra "URL", 'name' es el nombre del campo y 'placeholder' proporciona un ejemplo de URL de trabajo. -->

        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />
        <!-- Componente que genera una casilla de verificación para indicar si la oferta de trabajo es destacada.
             'label' muestra el texto "Feature (Costs Extra)" y 'name' es el nombre del campo, que indicará si la opción está marcada o no. -->

        <x-forms.divider />
        <!-- Componente que genera una línea divisoria, separando visualmente las secciones del formulario. -->

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="laracasts, video, education" />
        <!-- Componente que genera un campo de entrada para ingresar etiquetas, que se separan por comas.
             'label' muestra "Tags (comma separated)", 'name' es el nombre del campo y 'placeholder' da ejemplos de etiquetas. -->

        <x-forms.button>Publish</x-forms.button>
        <!-- Componente que genera un botón para enviar el formulario con el texto "Publish" (Publicar), para enviar los datos del trabajo a la ruta '/jobs'. -->
    </x-forms.form>
</x-layout>
