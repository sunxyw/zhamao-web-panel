<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>
    <link rel="stylesheet" href="/panel/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/panel/assets/styles/tailwind.css">
    <title>炸毛控制台 | <?= $this->e($title) ?: '什么也没有' ?></title>
</head>
<body class="text-blueGray-700 antialiased bg-blueGray-50">
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root">
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
    >
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
            <a
                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-xl font-bold p-2 px-4"
                href="../../index.html"
            >
                炸毛控制台
            </a>
            <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-3 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
                id="example-collapse-sidebar"
            >
                <!-- Navigation -->
                <ul id="navbar" class="md:flex-col md:min-w-full flex flex-col list-none pl-3">
                    <li class="items-center">
                        <a
                            href="/dashboard"
                            class="text-lg uppercase py-3 font-bold block hover:text-pink-600"
                        >
                            <i class="fas fa-tachometer-alt fa-fw mr-2 opacity-75"></i>
                            仪表盘
                        </a>
                    </li>

                    <li class="items-center">
                        <a
                            href="/bots"
                            class="text-lg uppercase py-3 font-bold block hover:text-pink-600"
                        >
                            <i class="fas fa-robot fa-fw mr-2 opacity-75"></i>
                            机器人
                        </a>
                    </li>

                    <li class="items-center">
                        <a
                            href="/plugins"
                            class="text-lg uppercase py-3 font-bold block hover:text-pink-600"
                        >
                            <i class="fas fa-cog fa-fw mr-2 opacity-75"></i>
                            插件配置
                        </a>
                    </li>

                    <li class="items-center">
                        <a
                            href="/market"
                            class="text-lg uppercase py-3 font-bold block hover:text-pink-600"
                        >
                            <i class="fas fa-puzzle-piece fa-fw mr-2 opacity-75"></i>
                            插件市场
                        </a>
                    </li>

                    <li class="items-center">
                        <a
                            href="/packages"
                            class="text-lg uppercase py-3 font-bold block hover:text-pink-600"
                        >
                            <i class="fas fa-box-open fa-fw mr-2 opacity-75"></i>
                            依赖管理
                        </a>
                    </li>

                    <li class="items-center">
                        <a
                            href="/sandbox"
                            class="text-lg uppercase py-3 font-bold block hover:text-pink-600"
                        >
                            <i class="fas fa-flask fa-fw mr-2 opacity-75"></i>
                            沙盒
                        </a>
                    </li>

                    <li class="items-center">
                        <a
                            href="/logs"
                            class="text-lg uppercase py-3 font-bold block hover:text-pink-600"
                        >
                            <i class="fas fa-clipboard-list fa-fw mr-2 opacity-75"></i>
                            日志
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="relative md:ml-64">
        <?= $this->section('content') ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script>
    const apiBaseUrl = 'http://localhost:20001/panel/api/';

    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
    });

    const failed = (message) => {
        Toast.fire({
            icon: 'error',
            title: message,
        });
    };
</script>
<script>
    (function () {
        const navbar = document.getElementById('navbar');
        const navs = navbar.querySelectorAll('li > a');
        const currentUrl = window.location.pathname;

        const baseUrl = currentUrl.split('/').slice(0, 2).join('/');

        navs.forEach(nav => {
            const href = nav.getAttribute('href');
            if (currentUrl.indexOf(href) !== -1) {
                nav.classList.add('text-pink-500');
            }
            nav.setAttribute('href', baseUrl + href);
        });
    })();
</script>
<?= $this->section('js') ?>
</body>
</html>
