package com.teknologiinformasi.restapi.tds.model;

import jakarta.persistence.*;
import java.time.LocalDateTime;

@Entity
@Table(name = "tdsmeters")
public class Tds {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private Double tds;  // Nilai suhu

    private LocalDateTime timestamp;  // Waktu data disimpan

    public Tds() {}

    public Tds(Double tds, LocalDateTime timestamp) {
        this.tds = tds;
        this.timestamp = timestamp;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Double getValue() {
        return tds;
    }

    public void setValue(Double tds) {
        this.tds = tds;
    }

    public LocalDateTime getTimestamp() {
        return timestamp;
    }

    public void setTimestamp(LocalDateTime timestamp) {
        this.timestamp = timestamp;
    }

    @Override
    public String toString() {
        return "Tdsmeter{" +
                "id=" + id +
                ", tds=" + tds +
                ", timestamp=" + timestamp +
                '}';
    }
}
