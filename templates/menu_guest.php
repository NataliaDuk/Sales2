<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(100,149,237);">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link<?= $this->data['controllerName'] == "Main" ? " active" : "" ?>" href="?">Главная <span
                            class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <img class='exit' src="/public/images/sales/open.jpg">
            </li>
            <li class="nav-item">
                <a class="nav-link<?= $this->data['controllerName'] == "Aut" ? " active" : "" ?>"
                   href="?type=Aut&action=show">Войти</a>
            </li>

        </ul>
    </div>
</nav>

