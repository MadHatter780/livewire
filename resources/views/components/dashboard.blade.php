<div class="w-full">

    <div class="py-4 w-full">
        <div class="mx-auto w-full sm:px-6 lg:px-8 flex" x-data="mqttData()">
            <div class="w-full flex flex-col  gap-y-2 overflow-y-auto dark:bg-gray-800 overflow-hidden">
                <div class=" gap-x-2 py-2 border-b-2 text-xl  flex border-slate-400">
                    <div class="flex gap-x-2 w-full">
                        <div class="font-bold ml-2">
                            Realtime
                        </div>
                        <div class="font-bold text-slate-400">
                            Energy
                        </div>
                        <div class="flex justify-end w-full">
                            <div class="font-bold">
                                {{ $titles }}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex">
                    <div class="flex rounded border border-black bg-white py-2 px-4 items-center gap-x-2">
                        <div class="font-semibold">
                            Session :
                        </div>
                        <div class="flex gap-x-2">
                            <div class="px-2 border border-black rounded-md bg-sky-300 bg-opacity-30">
                                R
                            </div>
                            <div class="px-2 border border-black rounded-md bg-sky-300 bg-opacity-30">
                                S
                            </div>
                            <div class="px-2 border border-black rounded-md bg-sky-300 bg-opacity-30">
                                T
                            </div>

                        </div>
                    </div>
                </div>
                <div class="w-full grid grid-cols-4 gap-4 border-2 p-2 border-slate-300 rounded-lg">
                    <x-card-dashboard :name="'Voltage'" :id="'voltage'" :satuan="'V'"
                        x-text="voltage"></x-card-dashboard>
                    <x-card-dashboard :name="'Current'" :id="'current'" :satuan="'A'"
                        x-text="current"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'V'"
                        x-text="powerphase"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Fac'" :id="'powerfac'" :satuan="''"
                        x-text="powerfac"></x-card-dashboard>

                    <x-card-dashboard :name="'Accumulate Energy'" :id="'accenergy'" :satuan="''"
                        x-text="accenergy"></x-card-dashboard>

                    <x-card-dashboard :name="'Sensor'" :id="'sensor'" :satuan="''"
                        x-text="sensor"></x-card-dashboard>

                </div>
            </div>
        </div>
    </div>

    <script>
        function mqttData() {
            return {
                voltage: 0,
                current: 0,
                powerphase: 0,
                powerfac: 0,
                accenergy: 0,
                sensor: 0,
                client: null,

                init() {
                    const brokerUrl = "wss://broker.emqx.io:8084/mqtt";
                    this.client = mqtt.connect(brokerUrl);

                    this.client.on("connect", () => {
                        console.log("Connected to EMQX broker.");
                        this.client.subscribe('tes/sectionA', (err) => {
                            if (!err) {
                                console.log('Subscribed to');
                            }
                        });
                    });

                    this.client.on("message", (topic, message) => {
                        const jsonMessage = JSON.parse(message.toString());
                        this.updateData(jsonMessage);
                    });

                    this.client.on("error", (error) => {
                        console.error("Connection error:", error);
                    });

                    // Tambahkan event listener untuk wire:navigate
                    document.addEventListener('livewire:navigate', () => {
                        if (this.client) {
                            this.client.end(); // Tutup koneksi MQTT
                            console.log("MQTT connection closed.");
                        }
                    });
                },

                updateData(jsonMessage) {
                    // Update the data values
                    this.voltage = jsonMessage.voltage;
                    this.current = jsonMessage.current;
                    this.powerphase = jsonMessage.powerphase;
                    this.powerfac = jsonMessage.powerfac;
                    this.accenergy = jsonMessage.accenergy;
                    this.sensor = jsonMessage.sensor;
                }
            };
        }
    </script>

</div>
