package com.teknologiinformasi.restapi.temperature.controller;

import com.teknologiinformasi.restapi.temperature.model.Temperature;
import com.teknologiinformasi.restapi.temperature.service.TemperatureService;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.*;
import org.springframework.web.bind.annotation.*;

import java.util.*;

@RestController
@RequestMapping("/api/temperature")
public class TemperatureController {

    private static final Logger log = LoggerFactory.getLogger(TemperatureController.class);

    @Autowired
    private TemperatureService temperatureService;

    // GET semua suhu
    @GetMapping
    public List<Temperature> getAllTemperatures() {
        log.info("GET /api/temperature accessed");
        return temperatureService.getAll();
    }

    // GET suhu berdasarkan ID
    @GetMapping("/{id}")
    public ResponseEntity<Temperature> getTemperatureById(@PathVariable Long id) {
        log.info("GET /api/temperature/{} accessed", id);
        return temperatureService.getById(id)
                .map(temp -> ResponseEntity.ok().body(temp))
                .orElse(ResponseEntity.notFound().build());
    }

    // POST suhu baru
    @PostMapping
    public Temperature createTemperature(@RequestBody Temperature temperature) {
        log.info("POST /api/temperature accessed with body: {}", temperature);
        return temperatureService.createTemperature(temperature);
    }

    // PUT update suhu
    @PutMapping("/{id}")
    public ResponseEntity<Temperature> updateTemperature(@PathVariable Long id, @RequestBody Temperature temperatureDetails) {
        log.info("PUT /api/temperature/{} accessed with body: {}", id, temperatureDetails);
        try {
            Temperature updated = temperatureService.updateTemperature(id, temperatureDetails);
            return ResponseEntity.ok(updated);
        } catch (RuntimeException e) {
            log.warn("PUT /api/temperature/{} failed: {}", id, e.getMessage());
            return ResponseEntity.notFound().build();
        }
    }

    // DELETE suhu
    @DeleteMapping("/{id}")
    public ResponseEntity<Map<String, String>> deleteTemperature(@PathVariable Long id) {
        log.info("DELETE /api/temperature/{} accessed", id);
        Map<String, String> response = new HashMap<>();
        try {
            temperatureService.deleteTemperature(id);
            response.put("message", "Temperature deleted successfully");
            return ResponseEntity.ok(response);
        } catch (RuntimeException e) {
            log.warn("DELETE /api/temperature/{} failed: {}", id, e.getMessage());
            response.put("message", "Temperature not found with id " + id);
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(response);
        }
    }
}
