{include 'header.tpl'}  

    <div class="mt-5 w-25 mx-auto">
        <form action="verify" method="POST">

            <div class="form-group">
                <label for="email"> Email </label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="password"> Password </label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            {if $error}
                <div class="alert alert-primary">
                    {$error}
                </div>
            {/if}

            <button type="submit" class="btn btn-primary">Entrar</button>

        </form>
    </div>