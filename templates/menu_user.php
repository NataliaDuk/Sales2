<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(100,149,237);">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link<?= $this->data['controllerName'] == "Main" ? " active" : "" ?>" href="?">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= $this->data['controllerName'] == "SalesUser" ? " active" : "" ?>"
                   href="?type=salesuser&action=show"> Продажи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= $this->data['controllerName'] == "Customers" ? " active" : "" ?>"
                   href="?type=customers&action=show">Справочник: Покупатели</a>
            </li>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle margin-left" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    ОТЧЕТЫ
                </button>
                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item<?= $this->data['controllerName'] == "UserReport" ? " active" : "" ?>" href="?type=userreport&action=show">Продажи по странам и видам продукции</a></li>
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
        </ul>
    </div>

</nav>


