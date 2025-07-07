package com.teknologiinformasi.restapi.temperature.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import com.teknologiinformasi.restapi.temperature.model.Temperature;

import java.util.Optional;

@Repository
public interface TemperatureRepository extends JpaRepository<Temperature, Long> {

    // Mengambil 1 data dengan timestamp terbaru
    Optional<Temperature> findTopByOrderByTimestampDesc();
}
