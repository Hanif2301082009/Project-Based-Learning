package com.teknologiinformasi.restapi.temperature.mqtt;

import com.fasterxml.jackson.databind.ObjectMapper;
import com.teknologiinformasi.restapi.temperature.model.Temperature;
import com.teknologiinformasi.restapi.temperature.service.TemperatureService;
import org.eclipse.paho.client.mqttv3.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import jakarta.annotation.PostConstruct;
import java.time.LocalDateTime;
import java.util.Map;

@Component
public class MqttTemperatureListener {

    private static final String MQTT_BROKER = "tcp://54.156.65.142:1883"; // atau IP EC2 jika MQTT broker di-host di sana
    private static final String CLIENT_ID = "temperature-service";
    private static final String TOPIC = "sensor/temperature";

    @Autowired
    private TemperatureService temperatureService;

    @PostConstruct
    public void init() {
        try {
            MqttClient client = new MqttClient(MQTT_BROKER, CLIENT_ID, null);
            MqttConnectOptions options = new MqttConnectOptions();
            options.setAutomaticReconnect(true);
            options.setCleanSession(true);
            client.connect(options);

            client.subscribe(TOPIC, (topic, message) -> {
                try {
                    String payload = new String(message.getPayload());
                    ObjectMapper mapper = new ObjectMapper();
                    Map<String, Object> jsonMap = mapper.readValue(payload, Map.class);

                    Double suhu = Double.parseDouble(jsonMap.get("suhu").toString());
                    LocalDateTime timestamp = LocalDateTime.now(); // bisa ambil dari JSON kalau tersedia

                    Temperature temp = new Temperature(suhu, timestamp);
                    temperatureService.createTemperature(temp);

                    System.out.println("✅ Data suhu diterima & disimpan: " + temp);

                } catch (Exception e) {
                    System.err.println("❌ Gagal parsing MQTT message: " + e.getMessage());
                }
            });

            System.out.println("🚀 MQTT listener aktif di topic: " + TOPIC);
        } catch (MqttException e) {
            e.printStackTrace();
        }
    }
}
