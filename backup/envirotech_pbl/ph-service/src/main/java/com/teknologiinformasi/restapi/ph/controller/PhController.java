package com.teknologiinformasi.restapi.ph.controller;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.*;
import org.springframework.web.bind.annotation.*;

import com.teknologiinformasi.restapi.ph.model.Ph;
import com.teknologiinformasi.restapi.ph.service.PhService;

import java.util.*;

@RestController
@RequestMapping("/api/ph")
public class PhController {

    private static final Logger log = LoggerFactory.getLogger(PhController.class);

    @Autowired
    private PhService phService;

    // GET semua data pH
    @GetMapping
    public List<Ph> getAllPh() {
        log.info("GET /api/ph accessed");
        return phService.getAll();
    }

    // GET data pH berdasarkan ID
    @GetMapping("/{id}")
    public ResponseEntity<Ph> getPhById(@PathVariable Long id) {
        log.info("GET /api/ph/{} accessed", id);
        return phService.getById(id)
                .map(ph -> ResponseEntity.ok().body(ph))
                .orElse(ResponseEntity.notFound().build());
    }

    // POST data pH baru
    @PostMapping
    public Ph createPh(@RequestBody Ph ph) {
        log.info("POST /api/ph accessed with body: {}", ph);
        return phService.createPh(ph);
    }

    // PUT update data pH
    @PutMapping("/{id}")
    public ResponseEntity<Ph> updatePh(@PathVariable Long id, @RequestBody Ph phDetails) {
        log.info("PUT /api/ph/{} accessed with body: {}", id, phDetails);
        try {
            Ph updated = phService.updatePh(id, phDetails);
            return ResponseEntity.ok(updated);
        } catch (RuntimeException e) {
            log.warn("PUT /api/ph/{} failed: {}", id, e.getMessage());
            return ResponseEntity.notFound().build();
        }
    }

    // DELETE data pH
    @DeleteMapping("/{id}")
    public ResponseEntity<Map<String, String>> deletePh(@PathVariable Long id) {
        log.info("DELETE /api/ph/{} accessed", id);
        Map<String, String> response = new HashMap<>();
        try {
            phService.deletePh(id);
            response.put("message", "pH data deleted successfully");
            return ResponseEntity.ok(response);
        } catch (RuntimeException e) {
            log.warn("DELETE /api/ph/{} failed: {}", id, e.getMessage());
            response.put("message", "pH data not found with id " + id);
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(response);
        }
    }
}
