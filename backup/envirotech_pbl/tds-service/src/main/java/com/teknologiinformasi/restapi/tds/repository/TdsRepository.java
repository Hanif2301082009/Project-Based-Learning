package com.teknologiinformasi.restapi.tds.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.teknologiinformasi.restapi.tds.model.Tds;

import java.util.Optional;

@Repository
public interface TdsRepository extends JpaRepository<Tds, Long> {

    // Mengambil 1 data dengan timestamp terbaru
    Optional<Tds> findTopByOrderByTimestampDesc();
}
