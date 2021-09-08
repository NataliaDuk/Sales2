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
            <li class="nav-item">
                <a class="nav-link<?= $this->data['controllerName'] == "Sales" ? " active" : "" ?>"
                   href="?type=sales&action=show">Продажи</a>
            </li>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle margin-left" type="button" id="dropdownMenuButton2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    СПРАВОЧНИКИ
                </button>
                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item<?= $this->data['controllerName'] == "Users" ? " active" : "" ?>"
                           href="?type=Users&action=show">Предприятия</a></li>
                    <li><a class="dropdown-item" <?= $this->data['controllerName'] == "UserGroups" ? " active" : "" ?>"
                        href="?type=UserGroups&action=show">Группа пользователей</a></li>
                    <li><a class="dropdown-item" <?= $this->data['controllerName'] == "Produkt" ? " active" : "" ?>"
                        href="?type=produkt&action=show">Продукция</a></li>
                    <li><a class="dropdown-item" <?= $this->data['controllerName'] == "Countries" ? " active" : "" ?>"
                        href="?type=countries&action=show">Страны</a></li>
                    <li><a class="dropdown-item" <?= $this->data['controllerName'] == "Customers" ? " active" : "" ?>"
                        href="?type=customers&action=show">Покупатели</a></li>
                </ul>

            </div>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle margin-left" type="button" id="dropdownMenuButton2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    ОТЧЕТЫ
                </button>

                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item<?= $this->data['controllerName'] == "SalesReport" ? " active" : "" ?>"
                           href="?type=salesreport&action=show">Продажи по предприятиям, странам и видам продукции</a></li>
<!--                    <li><a class="dropdown-item" href="">Продажи по предприятиям и видам продукции</a></li>-->
<!--                    <li><a class="dropdown-item" href="#">Продажи по предприятиям и странам</a></li>-->
                </ul>
            </div>
            <li class="nav-item active exit">
                <img class='exit' src="/public/images/sales/open.jpg">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?type=Aut&action=logout">Выйти: <?= isset($_SESSION['user']['code']) ? $_SESSION['user']['name'] : "" ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= $this->data['controllerName'] == "Aut" ? " active" : "" ?>"
                   href="?type=Aut&action=showreg">Регистрация</a>
            </li>
        </ul>
    </div>

</nav>

