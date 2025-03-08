<x-layout>
    <!-- Componente personalizado que proporciona la estructura o diseño (layout) para la página. 
         Envolviendo todo el contenido de la página dentro de un layout común para la aplicación. -->
    
    <x-page-heading>Log In</x-page-heading>
    <!-- Componente que genera un encabezado (heading) con el texto "Log In", típicamente utilizado como el título principal de la página. -->

    <x-forms.form method="POST" action="/login">
        <!-- Componente que genera un formulario con el método HTTP POST y la acción establecida en "/login", 
             es decir, el formulario se enviará a la ruta '/login'. -->

        <x-forms.input label="Email" name="email" type="email" />
        <!-- Componente que genera un campo de entrada para el correo electrónico del usuario.
             El atributo 'label' indica el texto a mostrar junto al campo de entrada, 
             'name' es el nombre del campo para enviar los datos, y 'type="email"' indica que el campo espera una dirección de correo electrónico. -->

        <x-forms.input label="Password" name="password" type="password" />
        <!-- Componente que genera un campo de entrada para la contraseña del usuario.
             El tipo 'password' oculta lo que se escribe en el campo. Similar al anterior, 
             'name' define el nombre del campo y 'label' muestra el texto "Password" al lado del campo. -->

        <x-forms.button>Log In</x-forms.button>
        <!-- Componente que genera un botón de tipo submit, que cuando es presionado, envía el formulario con el texto "Log In" en el botón. -->
    </x-forms.form>
</x-layout>
