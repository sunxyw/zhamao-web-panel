<?php $this->layout('layout', ['title' => 'Dashboard']) ?>

<div class="relative pb-32 pt-32">
    <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
                >
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div
                                class="relative w-full px-4 max-w-full flex-grow flex-1"
                            >
                                <h3 class="font-semibold text-lg text-blueGray-700">
                                    依赖管理
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table
                            class="items-center w-full bg-transparent border-collapse"
                        >
                            <thead>
                            <tr>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                >
                                    名称
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                >
                                    版本
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                ></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($packages as $package): ?>
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        <?= $package['name'] ?>
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        <?= $package['version'] ?>
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                                    >
                                        <a
                                            href="#pablo"
                                            class="text-blueGray-500 block py-1 px-3"
                                            data-package="<?= $package['name'] ?>"
                                        >
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div
                                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                                            id="package-dropdown-<?= $package['name'] ?>"
                                        >
                                            <a
                                                href="#pablo"
                                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                            >Action</a
                                            ><a
                                                href="#pablo"
                                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                            >Another action</a
                                            ><a
                                                href="#pablo"
                                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                            >Something else here</a
                                            >
                                            <div
                                                class="h-0 my-2 border border-solid border-blueGray-100"
                                            ></div>
                                            <a
                                                href="#pablo"
                                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                            >Seprated link</a
                                            >
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->push('js') ?>
<script>
    (function () {
        const dropdowns = document.querySelectorAll('[data-package]');

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', e => {
                e.preventDefault();
                const package_name = e.target.dataset.package;
                const dropdown_name = `package-dropdown-${package_name}`;
                let element = e.target;
                while (element.tagName !== 'A') {
                    element = element.parentNode;
                }
                Popper.createPopper(element, document.getElementById(dropdown_name), {
                    placement: 'bottom-start',
                });
                document.getElementById(dropdown_name).classList.toggle('hidden');
                document.getElementById(dropdown_name).classList.toggle('block');
            });
        });
    })();
</script>
<?php $this->end() ?>
