package com.teknologiinformasi.restapi.tds.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.teknologiinformasi.restapi.tds.model.Tds;
import com.teknologiinformasi.restapi.tds.repository.TdsRepository;

import java.util.List;
import java.util.Optional;

@Service
public class TdsService {

    @Autowired
    private TdsRepository tdsRepository;

    // Ambil semua data TDS
    public List<Tds> getAll() {
        return tdsRepository.findAll();
    }

    // Ambil data TDS berdasarkan ID
    public Optional<Tds> getById(Long id) {
        return tdsRepository.findById(id);
    }

    // Tambah data TDS baru
    public Tds createTds(Tds tds) {
        return tdsRepository.save(tds);
    }

    // Update data TDS berdasarkan ID
    public Tds updateTds(Long id, Tds tdsDetails) {
        Tds existing = tdsRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("TDS not found with id " + id));

        existing.setValue(tdsDetails.getValue());
        existing.setTimestamp(tdsDetails.getTimestamp());

        return tdsRepository.save(existing);
    }

    // Hapus data TDS berdasarkan ID
    public void deleteTds(Long id) {
        Tds existing = tdsRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("TDS not found with id " + id));
        tdsRepository.delete(existing);
    }

    // Ambil data TDS terbaru
    public Optional<Tds> getLatest() {
        return tdsRepository.findTopByOrderByTimestampDesc();
    }
}
