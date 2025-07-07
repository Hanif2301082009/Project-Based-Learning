package com.teknologiinformasi.restapi.tds.controller;

import com.teknologiinformasi.restapi.tds.model.Tds;
import com.teknologiinformasi.restapi.tds.service.TdsService;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.*;
import org.springframework.web.bind.annotation.*;

import java.util.*;

@RestController
@RequestMapping("/api/tds")
public class TdsController {

    private static final Logger log = LoggerFactory.getLogger(TdsController.class);

    @Autowired
    private TdsService tdsService;

    // GET semua data TDS
    @GetMapping
    public List<Tds> getAllTds() {
        log.info("GET /api/tds accessed");
        return tdsService.getAll();
    }

    // GET data TDS berdasarkan ID
    @GetMapping("/{id}")
    public ResponseEntity<Tds> getTdsById(@PathVariable Long id) {
        log.info("GET /api/tds/{} accessed", id);
        return tdsService.getById(id)
                .map(tds -> ResponseEntity.ok().body(tds))
                .orElse(ResponseEntity.notFound().build());
    }

    // POST data TDS baru
    @PostMapping
    public Tds createTds(@RequestBody Tds tds) {
        log.info("POST /api/tds accessed with body: {}", tds);
        return tdsService.createTds(tds);
    }

    // PUT update data TDS
    @PutMapping("/{id}")
    public ResponseEntity<Tds> updateTds(@PathVariable Long id, @RequestBody Tds tdsDetails) {
        log.info("PUT /api/tds/{} accessed with body: {}", id, tdsDetails);
        try {
            Tds updated = tdsService.updateTds(id, tdsDetails);
            return ResponseEntity.ok(updated);
        } catch (RuntimeException e) {
            log.warn("PUT /api/tds/{} failed: {}", id, e.getMessage());
            return ResponseEntity.notFound().build();
        }
    }

    // DELETE data TDS
    @DeleteMapping("/{id}")
    public ResponseEntity<Map<String, String>> deleteTds(@PathVariable Long id) {
        log.info("DELETE /api/tds/{} accessed", id);
        Map<String, String> response = new HashMap<>();
        try {
            tdsService.deleteTds(id);
            response.put("message", "TDS data deleted successfully");
            return ResponseEntity.ok(response);
        } catch (RuntimeException e) {
            log.warn("DELETE /api/tds/{} failed: {}", id, e.getMessage());
            response.put("message", "TDS data not found with id " + id);
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(response);
        }
    }
}
