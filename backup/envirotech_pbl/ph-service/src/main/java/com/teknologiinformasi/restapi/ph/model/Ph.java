package com.teknologiinformasi.restapi.ph.model;

import jakarta.persistence.*;
import java.time.LocalDateTime;

@Entity
@Table(name = "phvalues")
public class Ph {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private Double ph;  // Nilai pH

    private LocalDateTime timestamp;  // Waktu data disimpan

    public Ph() {}

    public Ph(Double ph, LocalDateTime timestamp) {
        this.ph = ph;
        this.timestamp = timestamp;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Double getPh() {
        return ph;
    }

    public void setPh(Double ph) {
        this.ph = ph;
    }

    public LocalDateTime getTimestamp() {
        return timestamp;
    }

    public void setTimestamp(LocalDateTime timestamp) {
        this.timestamp = timestamp;
    }

    @Override
    public String toString() {
        return "Ph{" +
                "id=" + id +
                ", ph=" + ph +
                ", timestamp=" + timestamp +
                '}';
    }
}
