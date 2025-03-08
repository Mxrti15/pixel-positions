<x-layout>
    <!-- Componente personalizado que proporciona el layout (plantilla) para la página. -->
    <x-page-heading>Log In</x-page-heading>
    <!-- Componente que genera el encabezado de la página con el texto "Log In". -->

    <x-forms.form method="POST" action="/login">
        <!-- Componente que genera un formulario con el método POST y la acción (ruta) '/login'. -->
        
        <x-forms.input label="Email" name="email" type="email" />
        <!-- Componente que genera un campo de entrada para el correo electrónico. 
             El 'label' es el texto que se mostrará junto al campo de entrada, 'name' define el nombre del campo, y 'type' indica que es un campo de tipo correo electrónico. -->

        <x-forms.input label="Password" name="password" type="password" />
        <!-- Componente que genera un campo de entrada para la contraseña. Similar al anterior, pero el tipo es 'password', lo que oculta el texto ingresado. -->

        <x-forms.button>Log In</x-forms.button>
        <!-- Componente que genera un botón para enviar el formulario con el texto "Log In". -->
    </x-forms.form>
</x-layout>
