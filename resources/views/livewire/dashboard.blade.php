<div class="w-full">
    <div class="py-4 w-full">
        <div class="mx-auto w-full sm:px-6 lg:px-8 flex" x-data="mqttData()">
            <div class="w-full flex flex-col gap-y-2 overflow-y-auto dark:bg-gray-800 overflow-hidden">
                <div class="gap-x-2 py-2 border-b-2 text-xl flex border-slate-400">
                    <div class="flex gap-x-2 w-full">
                        <div class="font-bold ml-2">Realtime</div>
                        <div class="font-bold text-slate-400">Energy</div>
                        <div class="flex justify-end w-full">
                            <div class="font-bold">{{ $names }}</div>
                        </div>
                    </div>
                </div>

                <div class="w-full grid grid-cols-4 gap-4 border-2 p-2 border-slate-300 rounded-lg">
                    <x-card-dashboard :name="'Voltage'" :id="'voltage'" :satuan="'V'"
                        x-text="voltage"></x-card-dashboard>
                    <x-card-dashboard :name="'Current'" :id="'current'" :satuan="'A'"
                        x-text="current"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'W'"
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

    <div class="mx-auto w-full sm:px-6 lg:px-8 flex">
        <div class="bg-white w-full border-2 shadow-sm rounded-lg">
            <div class=" text-lg flex">
                <div>
                    <div class="flex p-2 rounded-br-lg mb-2 bg-[#FF8F00] bg-opacity-70 gap-x-2 w-full">
                        <div class="font-bold ml-2">Realtime</div>
                        <div class="font-bold text-slate-100">Table</div>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Voltage (V)</th>
                            <th class="border border-gray-300 px-4 py-2">Current (A)</th>
                            <th class="border border-gray-300 px-4 py-2">Power Phase (W)</th>
                            <th class="border border-gray-300 px-4 py-2">Power Fac</th>
                            <th class="border border-gray-300 px-4 py-2">Accumulate Energy</th>
                            <th class="border border-gray-300 px-4 py-2">Sensor</th>
                        </tr>
                    </thead>
                    <tbody x-data="mqttData()">
                        <template x-for="(entry, index) in history" :key="index">
                            <tr>
                                <td class="border border-gray-300 px-4 py-2" x-text="entry.voltage"></td>
                                <td class="border border-gray-300 px-4 py-2" x-text="entry.current"></td>
                                <td class="border border-gray-300 px-4 py-2" x-text="entry.powerphase"></td>
                                <td class="border border-gray-300 px-4 py-2" x-text="entry.powerfac"></td>
                                <td class="border border-gray-300 px-4 py-2" x-text="entry.accenergy"></td>
                                <td class="border border-gray-300 px-4 py-2" x-text="entry.sensor"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
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
                history: [], // Store history of data
                maxHistory: 10, // Maximum history entries

                init() {
                    const brokerUrl = "wss://broker.emqx.io:8084/mqtt";
                    this.client = mqtt.connect(brokerUrl);

                    this.client.on("connect", () => {
                        let topic = "{{ $datas->topic }}";
                        console.log("Connected to EMQX broker.");
                        this.client.subscribe(topic, (err) => {
                            if (!err) {
                                console.log('Subscribed to', topic);
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

                    document.addEventListener('livewire:navigate', () => {
                        if (this.client) {
                            this.client.end(); // Close MQTT connection
                            console.log("MQTT connection closed.");
                        }
                    });
                },

                updateData(jsonMessage) {
                    // Store new entry
                    const newEntry = {
                        voltage: jsonMessage.voltage,
                        current: jsonMessage.current,
                        powerphase: jsonMessage.powerphase,
                        powerfac: jsonMessage.powerfac,
                        accenergy: jsonMessage.accenergy,
                        sensor: jsonMessage.sensor
                    };

                    // Add new entry to history
                    this.history.unshift(newEntry); // Add to the beginning of the array
                    if (this.history.length > this.maxHistory) {
                        this.history.pop(); // Remove the oldest entry
                    }

                    // Update variable values
                    this.voltage = jsonMessage.voltage;
                    this.current = jsonMessage.current;
                    this.powerphase = jsonMessage.powerphase;
                    this.powerfac = jsonMessage.powerfac;
                    this.accenergy = jsonMessage.accenergy;
                    this.sensor = jsonMessage.sensor;

                    // Log updated history
                    console.log("Updated history:", this.history);
                }
            };
        }
    </script>
</div>
