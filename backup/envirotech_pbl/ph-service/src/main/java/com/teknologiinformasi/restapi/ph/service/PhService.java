package com.teknologiinformasi.restapi.ph.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.teknologiinformasi.restapi.ph.model.Ph;
import com.teknologiinformasi.restapi.ph.repository.PhRepository;

import java.util.List;
import java.util.Optional;

@Service
public class PhService {

    @Autowired
    private PhRepository phRepository;

    // Ambil semua data pH
    public List<Ph> getAll() {
        return phRepository.findAll();
    }

    // Ambil data pH berdasarkan ID
    public Optional<Ph> getById(Long id) {
        return phRepository.findById(id);
    }

    // Tambah data pH baru
    public Ph createPh(Ph ph) {
        return phRepository.save(ph);
    }

    // Update data pH berdasarkan ID
    public Ph updatePh(Long id, Ph phDetails) {
        Ph existing = phRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("pH not found with id " + id));

        existing.setPh(phDetails.getPh());
        existing.setTimestamp(phDetails.getTimestamp());

        return phRepository.save(existing);
    }

    // Hapus data pH berdasarkan ID
    public void deletePh(Long id) {
        Ph existing = phRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("pH not found with id " + id));
        phRepository.delete(existing);
    }

    // Ambil data pH terbaru
    public Optional<Ph> getLatest() {
        return phRepository.findTopByOrderByTimestampDesc();
    }
}
