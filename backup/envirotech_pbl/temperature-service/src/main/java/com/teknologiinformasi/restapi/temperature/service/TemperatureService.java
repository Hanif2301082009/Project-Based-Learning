package com.teknologiinformasi.restapi.temperature.service;

import com.teknologiinformasi.restapi.temperature.model.Temperature;
import com.teknologiinformasi.restapi.temperature.repository.TemperatureRepository;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class TemperatureService {

    @Autowired
    private TemperatureRepository temperatureRepository;

    // Ambil semua data suhu
    public List<Temperature> getAll() {
        return temperatureRepository.findAll();
    }

    // Ambil data suhu berdasarkan ID
    public Optional<Temperature> getById(Long id) {
        return temperatureRepository.findById(id);
    }

    // Tambah data suhu baru
    public Temperature createTemperature(Temperature temperature) {
        return temperatureRepository.save(temperature);
    }

    // Update data suhu berdasarkan ID
    public Temperature updateTemperature(Long id, Temperature temperatureDetails) {
        Temperature existing = temperatureRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Temperature not found with id " + id));

        existing.setSuhu(temperatureDetails.getSuhu());
        existing.setTimestamp(temperatureDetails.getTimestamp());

        return temperatureRepository.save(existing);
    }

    // Hapus data suhu berdasarkan ID
    public void deleteTemperature(Long id) {
        Temperature existing = temperatureRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Temperature not found with id " + id));
        temperatureRepository.delete(existing);
    }

    // Ambil suhu terbaru
    public Optional<Temperature> getLatest() {
        return temperatureRepository.findTopByOrderByTimestampDesc();
    }
}
