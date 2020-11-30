{include 'header.tpl'} 

{include 'templates/form_registro.tpl'}

{if $error}
    <div class="alert alert-primary">
        {$error}
    </div>
{/if}


{include 'footer.tpl'}