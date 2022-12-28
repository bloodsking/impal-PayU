<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css\sidebar.css">
</head>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="{{ request()->is('/home') ? 'active' : '' }}">
        <a href="/home" class="nav-link">
            <span class="material-symbols-outlined">
                home
                </span>
          <p>
            Home
            <i ></i>
          </p>
        </a>
      </li>

      <li class="{{request() -> is ('pemasukan') ? 'active' : ''}}">
        <a href="/pemasukan" class="nav-link">
            <span class="material-symbols-outlined">
                savings
                </span>
          <p>
            Pemasukan
          </p>
        </a>
      </li>
      <li class="{{request() -> is ('cita-cita') ? 'active' : ''}}">
        <a href="/cita-cita" class="nav-link">
            <span class="material-symbols-outlined">
                settings_system_daydream
                </span>
          <p>
            Cita-cita
          </p>
        </a>
      </li>

      <li class="{{request() -> is ('kalkulator') ? 'active' : ''}}">
        <a href="/kalkulator" class="nav-link">
            <span class="material-symbols-outlined">
                calculate
                </span>
            <p>Kalkulator</p>
        </a>
      </li>
      <li class="{{request() -> is ('pengeluaran') ? 'active' : ''}}">
        <a href="/pengeluaran" class="nav-link">
            <span class="material-symbols-outlined">
                account_balance_wallet
                </span>
            <p>Pengeluaran</p>
        </a>
      </li>
    </ul>
  </nav>
</div>


