package com.teknologiinformasi.restapi.temperature.model;

import jakarta.persistence.*;
import java.time.LocalDateTime;

@Entity
@Table(name = "temperatures")
public class Temperature {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private Double suhu;  // Nilai suhu

    private LocalDateTime timestamp;  // Waktu data disimpan

    public Temperature() {}

    public Temperature(Double suhu, LocalDateTime timestamp) {
        this.suhu = suhu;
        this.timestamp = timestamp;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Double getSuhu() {
        return suhu;
    }

    public void setSuhu(Double suhu) {
        this.suhu = suhu;
    }

    public LocalDateTime getTimestamp() {
        return timestamp;
    }

    public void setTimestamp(LocalDateTime timestamp) {
        this.timestamp = timestamp;
    }

    @Override
    public String toString() {
        return "Temperature{" +
                "id=" + id +
                ", suhu=" + suhu +
                ", timestamp=" + timestamp +
                '}';
    }
}
