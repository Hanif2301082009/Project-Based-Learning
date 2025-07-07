package com.teknologiinformasi.restapi.ph.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.teknologiinformasi.restapi.ph.model.Ph;

import java.util.Optional;

@Repository
public interface PhRepository extends JpaRepository<Ph, Long> {

    // Mengambil 1 data dengan timestamp terbaru
    Optional<Ph> findTopByOrderByTimestampDesc();
}
