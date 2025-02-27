function updateInvoiceFields() {
    const invoice = document.getElementById("kind_of_legal_invoice");
    let country = null;
    const var_country = document.getElementById("billing_country");
    //const currencyValue = document.querySelector('.woocs_curr_curr')?.getAttribute('data-currency');

    const isfex = invoice.value === "fex";
    if(var_country){
        country = var_country.value;
    }else{
        country = "CL";
    }
    const isChile = country === "CL";
    //const isUSD = currencyValue === "USD";

    // Mostrar/ocultar secciones
    document.getElementById("factofacturacionelectronica_div_factura").style.display = (isfex || invoice.value === "fe" || invoice.value === "fee") ? "block" : "none";
    document.getElementById("datosExportacion_div_facturaExportacion").style.display =  isfex ? "block" : "none";

    //campos por tipo de factura
    
    
    const camposFactura = [
        "oml_campo_rut",
        "campo_razon_social",
        "campo_giro",
        "modalidad_venta",
        "clausula_venta"
    ];
    //recorre los campos y los deshabilita si es exportación
    camposFactura.forEach(id => {
        const campos = document.getElementById(id);
        if (campos) {
            campos.disabled = isfex && isChile;
            if (!isfex && campos.id === "oml_campo_rut") {
                campos.onchange = function () {
                    const rut = new Rut(this.value);
                    if (!rut.validate()) {
                        alert("RUT ingresado inválido");
                        this.value = "";
        } else {
            this.value = rut.getNiceRut();
        }



        };



                } else {
                campos.onchange = null;
                        }
                }
        });

    if (isfex && isChile) {
        alert("No se puede realizar factura de exportación con país de emisión Chile.");
        camposFactura.forEach(id => {
            const campos = document.getElementById(id);
            if (campos) campos.value = "";
        });
        }


        }

document.addEventListener("DOMContentLoaded", function () {
    const selectKindInvoice = document.getElementById("kind_of_legal_invoice");
    const billingCountry = document.getElementById("billing_country");

    selectKindInvoice.addEventListener("change", updateInvoiceFields);
    if (billingCountry) {
    billingCountry.addEventListener("change", updateInvoiceFields);
    } else {
        console.warn("No se encontró el elemento con ID 'billing_country'.");
    }

    //cambio de placeholder RUT a Tax ID
    selectKindInvoice.addEventListener('change', (event) => {
        let rutplaceholder = document.getElementById("oml_campo_rut");
        if(document.getElementById("kind_of_legal_invoice").value == 'fex'){
            rutplaceholder.placeholder = "Ingrese Tax ID";
            } else {
            rutplaceholder.placeholder = "Ingrese RUT";
            }

        //forzar el cambio de placeholder
        rutplaceholder.setAttribute('placeholder', rutplaceholder.placeholder);
    });

    updateInvoiceFields();
});

(function(root, factory) {
    if (typeof define === 'function' && define.amd) {
        define(function() {
            return root.Rut = factory();
        });
    } else if (typeof exports === 'object') {
        module.exports = factory();
    } else {
        root.Rut = factory();
    }
})(this, function() {
    var Rut;
    Rut = (function() {
        var _cleanRut, _formatRut, _getCheckDigit;

        function Rut(rut, withoutCheckDigit) {
            this.setRut(rut, withoutCheckDigit);
        }

        Rut.prototype.setRut = function(rut, withoutCheckDigit) {
            if (withoutCheckDigit == null) {
                withoutCheckDigit = false;
            }
            if (typeof rut !== 'string') {
                throw new Error('rut tiene que ser string');
            }
            this.rut = withoutCheckDigit ? _cleanRut(rut) : _cleanRut(rut.substr(0, rut.length - 1));
            this.checkDigit = withoutCheckDigit ? _getCheckDigit(rut) : rut.substr(rut.length - 1).toUpperCase();
            this.isValid = this.validate();
        };

        Rut.prototype.validate = function() {
            var checkDigit;
            if (!/([0-9]|k)/i.test(this.checkDigit)) {
                return false;
            }
            checkDigit = _getCheckDigit(this.rut);
            return this.checkDigit.toLowerCase() === checkDigit.toLowerCase();
        };

        Rut.prototype.getCleanRut = function() {
            return this.rut + '' + this.checkDigit;
        };

        Rut.prototype.getNiceRut = function(type) {
            if (type == null) {
                type = true;
            }
            if (type) {
                return _formatRut(this.rut) + '-' + this.checkDigit;
            } else {
                return this.rut + '-' + this.checkDigit;
            }
        };

        _cleanRut = function(rut) {
            return rut.replace(/(\.|\-)/g, '');
        };

        _getCheckDigit = function(rut) {
            var i, mul, res, sum;
            sum = 0;
            i = rut.length;
            mul = 2;
            while (--i >= 0) {
                sum += rut.charAt(i) * mul;
                if (++mul === 8) {
                    mul = 2;
                }
            }
            res = sum % 11;
            if (res === 1) {
                return 'K';
            } else if (res === 0) {
                return '0';
            } else {
                return String(11 - res);
            }
        };

        _formatRut = function(rut) {
            return rut.split('').reverse().reduce(function(a, b, i) {
                return a = i % 3 === 0 ? b + '.' + a : b + '' + a;
            });
        };

        return Rut;

    })();
    return Rut;
});