document.addEventListener('DOMContentLoaded', function() {
    const app = {
        init() {
            this.setupValues();
            this.setupEventListeners();
            this.updateUI();
            this.startStatusCheck();
        },

        setupValues() {
            // Initialisierung der Werte aus den hidden fields
            this.option = document.getElementById('wplock-mode').textContent;
            this.disableUntilValue = document.getElementById('wplock-dFor').textContent;
            this.disableUntilValueI = document.getElementById('wplock-dForI').textContent;
            
            // Setze die gespeicherten Werte in die Eingabefelder
            const timeInput = document.querySelector('input[type="number"][name="wplock-for"]');
            const unitSelect = document.querySelector('select[name="wplock-for-i"]');
            
            if (timeInput && this.option === "2") {
                timeInput.value = this.disableUntilValue;
            }
            if (unitSelect && this.option === "2") {
                unitSelect.value = this.disableUntilValueI;
            }
        },

        setupEventListeners() {
            // Radio Buttons für Modi
            document.querySelectorAll('input[name="wplock-plugin-mode"]').forEach(input => {
                input.addEventListener('change', (e) => {
                    this.option = e.target.value;
                    this.updateUI();
                });
            });

            // Zeit-Inputs
            const timeInputs = document.querySelectorAll('input[type="number"][name="wplock-for"], select[name="wplock-for-i"]');
            timeInputs.forEach(input => {
                input.addEventListener('change', () => this.updateDatePreview());
            });

            // Quick-Unlock Buttons
            const quickUnlock2h = document.querySelector('.warning-button.start');
            const quickUnlock4h = document.querySelectorAll('.warning-button')[1];
            
            if (quickUnlock2h) {
                quickUnlock2h.addEventListener('click', () => this.unlockForHours(2));
            }
            if (quickUnlock4h) {
                quickUnlock4h.addEventListener('click', () => this.unlockForHours(4));
            }
        },

        updateUI() {
            // Alle Felder deaktivieren
            document.querySelectorAll('.wplock-value').forEach(el => {
                el.disabled = true;
                el.closest('td')?.classList.remove('active');
                el.closest('td')?.classList.add('inactive');
            });

            // Relevante Felder aktivieren
            const activeRow = document.querySelector(`input[value="${this.option}"]`)?.closest('td');
            if (activeRow) {
                activeRow.classList.remove('inactive');
                activeRow.classList.add('active');
                activeRow.querySelectorAll('.wplock-value').forEach(el => {
                    el.disabled = false;
                });
            }

            // Warnung anzeigen/verstecken
            const warning = document.querySelector('.warning-permanently');
            if (warning) {
                warning.style.display = this.option === "0" ? "block" : "none";
            }

            this.updateDatePreview();
        },

        updateDatePreview() {
            const value = document.querySelector('input[type="number"][name="wplock-for"]')?.value;
            const unit = document.querySelector('select[name="wplock-for-i"]')?.value;
            
            if (!value) return;

            const date = new Date();
            const val = parseInt(value);

            switch(unit) {
                case "0": // Minuten
                    date.setMinutes(date.getMinutes() + val);
                    break;
                case "1": // Stunden
                    date.setHours(date.getHours() + val);
                    break;
                case "2": // Tage
                    date.setDate(date.getDate() + val);
                    break;
                case "3": // Wochen
                    date.setDate(date.getDate() + (val * 7));
                    break;
            }

            const dateString = this.formatDate(date);
            const previewElement = document.querySelector(
                this.option === "2" ? '#disableUntilPreview' : '#enableUntilPreview'
            );

            if (previewElement) {
                previewElement.textContent = `Site will be ${this.option === "2" ? 'unlocked' : 'locked'} until ${dateString}`;
                previewElement.style.display = 'block';
            }
        },

        formatDate(date) {
            // Deutsche Datumsformatierung
            return date.toLocaleString('de-DE', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            });
        },

        unlockFor2Hours() {
            this.unlockForHours(2);
        },

        unlockFor4Hours() {
            this.unlockForHours(4);
        },

        unlockForHours(hours) {
            // Radio-Button für Option 2 auswählen
            const modeInput = document.querySelector('input[name="wplock-plugin-mode"][value="2"]');
            if (modeInput) {
                modeInput.checked = true;
                this.option = "2";
            }

            // Zeit und Einheit setzen
            const timeInput = document.querySelector('input[name="wplock-disable-for"]');
            const unitSelect = document.querySelector('select[name="wplock-disable-for-i"]');
            
            if (timeInput) {
                timeInput.value = hours;
            }
            if (unitSelect) {
                unitSelect.value = "1"; // 1 = Stunden
            }

            this.updateUI();
            this.updateDatePreview();
        },

        // Erweiterte Datumsfunktionen
        dateHelpers: {
            addToDate(date, value, unit) {
                const newDate = new Date(date);
                switch(unit) {
                    case "0": // Minuten
                        newDate.setMinutes(date.getMinutes() + value);
                        break;
                    case "1": // Stunden
                        newDate.setHours(date.getHours() + value);
                        break;
                    case "2": // Tage
                        newDate.setDate(date.getDate() + value);
                        break;
                    case "3": // Wochen
                        newDate.setDate(date.getDate() + (value * 7));
                        break;
                    case "months":
                        newDate.setMonth(date.getMonth() + value);
                        break;
                    case "years":
                        newDate.setFullYear(date.getFullYear() + value);
                        break;
                }
                return newDate;
            },

            parseDate(dateString) {
                // Unterstützt verschiedene Datumsformate
                if (!dateString) return new Date();
                
                // ISO Format
                if (dateString.includes('T')) {
                    return new Date(dateString);
                }
                
                // DE Format (DD.MM.YYYY)
                const [day, month, year] = dateString.split('.');
                if (day && month && year) {
                    return new Date(year, month - 1, day);
                }
                
                // Fallback
                return new Date(dateString);
            },

            formatDateTime(date, format = 'full') {
                const d = new Date(date);
                const options = {
                    full: {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit',
                        timeZone: 'Europe/Berlin'
                    },
                    date: {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit'
                    },
                    time: {
                        hour: '2-digit',
                        minute: '2-digit'
                    }
                };

                return d.toLocaleString('de-DE', options[format]);
            },

            isValid(dateString) {
                const date = this.parseDate(dateString);
                return date instanceof Date && !isNaN(date);
            },

            diff(date1, date2, unit = 'minutes') {
                const d1 = this.parseDate(date1);
                const d2 = this.parseDate(date2);
                const diffMs = d2 - d1;
                
                switch(unit) {
                    case 'minutes':
                        return Math.floor(diffMs / (1000 * 60));
                    case 'hours':
                        return Math.floor(diffMs / (1000 * 60 * 60));
                    case 'days':
                        return Math.floor(diffMs / (1000 * 60 * 60 * 24));
                    case 'weeks':
                        return Math.floor(diffMs / (1000 * 60 * 60 * 24 * 7));
                    default:
                        return diffMs;
                }
            }
        },

        // Reaktives System für UI-Updates
        reactiveSystem: {
            subscribers: new Map(),
            
            track(key, callback) {
                if (!this.subscribers.has(key)) {
                    this.subscribers.set(key, new Set());
                }
                this.subscribers.get(key).add(callback);
            },

            trigger(key) {
                if (this.subscribers.has(key)) {
                    this.subscribers.get(key).forEach(callback => callback());
                }
            },

            watch(key, callback) {
                this.track(key, callback);
            }
        },

        // Neue Methode für regelmäßige Statusüberprüfung
        startStatusCheck() {
            setInterval(() => {
                this.checkLockStatus();
            }, 10000); // Alle 10 Sekunden prüfen
        },

        // Neue Methode für AJAX-Anfrage
        async checkLockStatus() {
            try {
                const response = await fetch(ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'check_wplock_status',
                        nonce: wplock_ajax.nonce
                    })
                });
                
                if (response.ok) {
                    const data = await response.json();
                    if (data.reload) {
                        window.location.reload();
                    }
                }
            } catch (error) {
                console.error('Error checking lock status:', error);
            }
        }
    };

    app.init();
});
