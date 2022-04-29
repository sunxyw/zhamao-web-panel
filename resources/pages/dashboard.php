<?php $this->layout('layout', ['title' => '仪表盘']) ?>

<div class="relative pb-32 pt-12">
    <div class="px-4 md:px-10 mx-auto w-full">
        <div>
            <!-- Card stats -->
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div
                                    class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                >
                                    <h5
                                        class="text-blueGray-400 uppercase font-bold text-sm"
                                    >
                                        当前消息频率
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700"
                                          id="message-frequency">0 / min</span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"
                                    >
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                    >
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div
                                    class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                >
                                    <h5
                                        class="text-blueGray-400 uppercase font-bold text-sm"
                                    >
                                        已连接机器人
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700"
                                          id="bots-count">0</span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500"
                                    >
                                        <i class="fas fa-robot"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                    >
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div
                                    class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                >
                                    <h5
                                        class="text-blueGray-400 uppercase font-bold text-sm"
                                    >
                                        用户数量
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700"
                                          id="users-count">0</span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500"
                                    >
                                        <i class="fas fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                    >
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div
                                    class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                >
                                    <h5
                                        class="text-blueGray-400 uppercase font-bold text-sm"
                                    >
                                        群聊数量
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700"
                                          id="groups-count">0</span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500"
                                    >
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap pt-8">
                <div class="w-full px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                    >
                        <div class="flex-auto p-4">
                            <div class="relative pt-1">
                                <h5
                                    class="uppercase font-bold text-xl pb-4"
                                >
                                    负载状态
                                </h5>

                                <!-- CPU Usage -->
                                <div class="flex mb-2 items-center justify-between">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200">
                                            CPU
                                        </span>
                                        <span id="cpu-usage-text" class="text-xs font-semibold inline-block text-pink-600">
                                            0%
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                                    <div id="cpu-usage-bar" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                                </div>

                                <!-- Memory Usage -->
                                <div class="flex mb-2 items-center justify-between">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200">
                                            Memory
                                        </span>
                                        <span id="memory-usage-text" class="text-xs font-semibold inline-block text-pink-600">
                                            0%
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                                    <div id="memory-usage-bar" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->push('js') ?>
<script>
    (function () {
        const msgFreqDisplay = document.getElementById('message-frequency');
        const botsCountDisplay = document.getElementById('bots-count');
        const usersCountDisplay = document.getElementById('users-count');
        const groupsCountDisplay = document.getElementById('groups-count');

        const cpuUsageTextDisplay = document.getElementById('cpu-usage-text');
        const cpuUsageBarDisplay = document.getElementById('cpu-usage-bar');

        const memoryUsageTextDisplay = document.getElementById('memory-usage-text');
        const memoryUsageBarDisplay = document.getElementById('memory-usage-bar');

        const updateStats = () => {
            if (!document.hasFocus()) {
                return;
            }
            fetch(apiBaseUrl + 'stats/batch')
                .then(res => res.json())
                .then(data => {
                    msgFreqDisplay.innerText = data.message.average + ' / min';
                    botsCountDisplay.innerText = data.bot.count;
                    usersCountDisplay.innerText = data.user.total;
                    groupsCountDisplay.innerText = data.group.total;

                    cpuUsageTextDisplay.innerText = data.server.cpu.avg + '%';
                    cpuUsageBarDisplay.style.width = data.server.cpu.avg + '%';

                    const memoryUsage = ((data.server.memory.total - data.server.memory.free) / data.server.memory.total * 100).toFixed(2);
                    memoryUsageTextDisplay.innerText = memoryUsage + '%';
                    memoryUsageBarDisplay.style.width = memoryUsage + '%';
                })
                .catch(err => {
                    console.error('Failed to fetch stats', err);
                    failed('无法获取统计数据');
                });
        };

        updateStats();
        setInterval(updateStats, 5000);
    })();
</script>
<?php $this->end() ?>
