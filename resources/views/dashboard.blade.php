<x-app-layout>
    <div class="py-12 w-full">
        <div class="mx-auto w-full sm:px-6 lg:px-8 flex" x-data="mqttData()">

            <div class="w-full overflow-y-auto dark:bg-gray-800 overflow-hidden">
                <div class="flex gap-x-2 p-2 text-xl">
                    <div class="font-bold ml-2">
                        Realtime
                    </div>
                    <div class="font-bold text-slate-400">
                        Energy
                    </div>
                </div>
                <div class="w-full grid grid-cols-4 gap-4">
                    <x-card-dashboard :name="'voltage'" :id="'voltage'" :satuan="'V'"
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

    @if (request()->is('dashboard'))
        <script>
            function mqttData() {
                return {
                    voltage: 0,
                    current: 0,
                    powerphase: 0,
                    powerfac: 0,
                    accenergy: 0,
                    sensor: 0,

                    // Simpan nilai sebelumnya
                    previousValues: {
                        voltage: 0,
                        current: 0,
                        powerphase: 0,
                        powerfac: 0,
                        accenergy: 0,
                        sensor: 0
                    },

                    init() {
                        const brokerUrl = "wss://broker.emqx.io:8084/mqtt";
                        const client = mqtt.connect(brokerUrl);

                        client.on("connect", () => {
                            console.log("Connected to EMQX broker.");
                            client.subscribe("tes/sectionA", (err) => {
                                if (!err) {
                                    console.log('Subscribed to "tes/sectionA"');
                                }
                            });
                        });

                        client.on("message", (topic, message) => {
                            console.log(`Received message from ${topic}: ${message.toString()}`);
                            const jsonMessage = JSON.parse(message.toString());
                            console.log(jsonMessage);

                            // Hitung selisih dan simpan nilai saat ini
                            const currentVoltage = jsonMessage.voltage;
                            const currentCurrent = jsonMessage.current;
                            const currentPowerphase = jsonMessage.powerphase;
                            const currentPowerfac = jsonMessage.powerfac;
                            const currentAccenergy = jsonMessage.accenergy;
                            const currentSensor = jsonMessage.sensor;

                            // Hitung selisih dengan nilai sebelumnya
                            const voltageDiff = currentVoltage - this.previousValues.voltage;
                            const currentDiff = currentCurrent - this.previousValues.current;
                            const powerphaseDiff = currentPowerphase - this.previousValues.powerphase;
                            const powerfacDiff = currentPowerfac - this.previousValues.powerfac;
                            const accenergyDiff = currentAccenergy - this.previousValues.accenergy;
                            const sensorDiff = currentSensor - this.previousValues.sensor;

                            console.log(`Voltage Diff: ${voltageDiff}`);
                            console.log(`Current Diff: ${currentDiff}`);
                            console.log(`Power Phase Diff: ${powerphaseDiff}`);
                            console.log(`Power Fac Diff: ${powerfacDiff}`);
                            console.log(`Accumulate Energy Diff: ${accenergyDiff}`);
                            console.log(`Sensor Diff: ${sensorDiff}`);

                            // Update nilai saat ini
                            this.voltage = currentVoltage;
                            this.current = currentCurrent;
                            this.powerphase = currentPowerphase;
                            this.powerfac = currentPowerfac;
                            this.accenergy = currentAccenergy;
                            this.sensor = currentSensor;

                            // Simpan nilai saat ini ke previousValues untuk digunakan di iterasi berikutnya
                            this.previousValues.voltage = currentVoltage;
                            this.previousValues.current = currentCurrent;
                            this.previousValues.powerphase = currentPowerphase;
                            this.previousValues.powerfac = currentPowerfac;
                            this.previousValues.accenergy = currentAccenergy;
                            this.previousValues.sensor = currentSensor;
                        });

                        client.on("error", (error) => {
                            console.error("Connection error:", error);
                        });
                    }
                }
            }

            mqttData();
        </script>
    @endif
</x-app-layout>
