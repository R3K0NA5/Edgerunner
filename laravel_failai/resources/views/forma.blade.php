<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/solarRoof.css') }}" rel="stylesheet" type="text/css">
</head>
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .form-container {
        display: flex;
        height: 100%;
        flex-wrap: wrap;
        gap: 20px;
        align-items: center;
        justify-content: center;
    }

    .form-container > div {
        flex: 1;
        height: 100%;
    }

    .form-container > div:first-child {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .form-container > div:first-child > form {
        width: 100%;
        max-width: 100%;
    }

    .form-container > div:first-child > form > * {
        margin-bottom: 10px;
    }


    .pdf-preview-container > iframe {
        border: none;
        width: 100%;
        max-height: 100%;
    }
</style>

<div class="form-container">
    <div class="col-6">
        <form method="POST" action="/submit-form" target="pdf-preview">
            @csrf
            <div class="row">
                <div class="col-6">
                    <h2 style="text-align:center">Asmens duomenys</h2><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date">Data:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="date" name="date" id="date" value="{{ $formData['date'] ?? '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Vardas:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" value="{{ $formData['name'] ?? '' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="surname">Pavarde:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="surname" id="surname" value="{{ $formData['surname'] ?? '' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="phone">Telefonas:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" id="phone" value="{{ $formData['phone'] ?? '' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">El pastas:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" value="{{ $formData['email'] ?? '' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="address">Address:</label>
                        </div>
                        <div class="col-md-6">
                            <input name="address" id="address" value="{{ $formData['address'] ?? '' }}">
                        </div>
                    </div>
                </div>
                <div class="col-6">

                    <h2 style="text-align:center">Pasirinkimai</h2><br>
                    <br>
                    <label for="modelis">Modelis:</label>
                    <select name="modelis" id="modelis">
                        <option value="Xs">XS</option>
                        <option value="Classic">Classic</option>
                        <option value="Basic">Basic</option>
                        <option value="papildomasModelis">Papildomas Modelis</option>
                    </select>

                    <div id="papildomasModelis-info" style="display:none;">
                        <label for="papildomasModelis-comment">Modelio komentaras:</label>
                        <input type="text" name="papildomasModelis-comment" id="papildomasModelis-comment">
                    </div>

                    <script>
                        // Get the dropdown and papildomasModelis-info div
                        var modelis = document.getElementById("modelis");
                        var papildomasModelisInfo = document.getElementById("papildomasModelis-info");

                        // Add event listener to show/hide papildomasModelis-info div
                        modelis.addEventListener("change", function () {
                            if (modelis.value === "papildomasModelis") {
                                papildomasModelisInfo.style.display = "block";
                            } else {
                                papildomasModelisInfo.style.display = "none";
                            }
                        });
                    </script>
                    <br>
                    <label for="remo-spalva">Remo spalva:</label>
                    <select name="remo-spalva" id="remo-spalva">
                        <option value="RAL8019">RAL 8019 (juoda)</option>
                        <option value="RAL7016">RAL 7016 (grafitas)</option>
                        <option value="papildomaRemoSpalva">Papildoma remo spalva</option>
                    </select>

                    <div id="papildomaRemoSpalva-info" style="display:none;">
                        <label for="papildomaRemoSpalva-comment">Remo spalvos komentaras:</label>
                        <input type="text" name="papildomaRemoSpalva-comment" id="papildomaRemoSpalva-comment">
                    </div>

                    <script>
                        // Get the dropdown and papildomaRemoSpalva-info div
                        var remoSpalva = document.getElementById("remo-spalva");
                        var papildomaRemoSpalvaInfo = document.getElementById("papildomaRemoSpalva-info");

                        // Add event listener to show/hide papildomaRemoSpalva-info div
                        remoSpalva.addEventListener("change", function () {
                            if (remoSpalva.value === "papildomaRemoSpalva") {
                                papildomaRemoSpalvaInfo.style.display = "block";
                            } else {
                                papildomaRemoSpalvaInfo.style.display = "none";
                            }
                        });
                    </script>
                    <br>
                    <label for="dazymo-tipas">Dazymo tipas:</label>
                    <select name="dazymo-tipas" id="dazymo-tipas">
                        <option value="Lygus">Lygus</option>
                        <option value="Strukturinis">Strukturinis (Coatex)</option>
                        <option value="Be-dazymo">Be dazymo</option>
                        <option value="Papildomas-dazymo-tipas">Papildomas dazymo tipas</option>
                    </select>

                    <div id="papildomas-dazymo-tipas-info" style="display:none;">
                        <label for="papildomas-dazymo-tipas-comment">Dazymo tipas komentaras:</label>
                        <input type="text" name="papildomas-dazymo-tipas-comment" id="papildomas-dazymo-tipas-comment">
                    </div>

                    <script>
                        // Get the dropdown and papildomas-dazymo-tipas-info div
                        var dazymoTipas = document.getElementById("dazymo-tipas");
                        var papildomasDazymoTipasInfo = document.getElementById("papildomas-dazymo-tipas-info");

                        // Add event listener to show/hide papildomas-dazymo-tipas-info div
                        dazymoTipas.addEventListener("change", function () {
                            if (dazymoTipas.value === "Papildomas-dazymo-tipas") {
                                papildomasDazymoTipasInfo.style.display = "block";
                            } else {
                                papildomasDazymoTipasInfo.style.display = "none";
                            }
                        });
                    </script>
                    <br>
                    <label for="danga-pc-16mm">Danga PC 16 mm:</label>
                    <select name="dangosTipas" id="danga-pc-16mm">
                        <option value="skaidrus">Skaidrus</option>
                        <option value="rudas-bronza">Rudas bronza</option>
                        <option value="baltas-opalas">Baltas opalas</option>
                        <option value="papildoma-danga">Papildoma danga</option>
                    </select>
                    <div id="papildoma-danga-info" style="display:none;">
                        <label for="papildoma-danga-comment">Dangos komentaras:</label>
                        <input type="text" name="papildoma-danga-comment" id="papildoma-danga-comment">
                    </div>
                    <script>
                        // Get the dropdown and papildoma-danga-info div
                        var dangaPc16mm = document.getElementById("danga-pc-16mm");
                        var papildomaDangaInfo = document.getElementById("papildoma-danga-info");

                        // Add event listener to show/hide papildoma-danga-info div
                        dangaPc16mm.addEventListener("change", function () {
                            if (dangaPc16mm.value === "papildoma-danga") {
                                papildomaDangaInfo.style.display = "block";
                            } else {
                                papildomaDangaInfo.style.display = "none";
                            }
                        });
                    </script>
                    <br>
                    <label for="gs">Gs:</label>
                    <select name="gs" id="gs">
                        <option value="Skaidrus">Skaidrus</option>
                        <option value="Rudas-tonuotas">Rudas tonuotas</option>
                        <option value="Pilkas-tonuotas">Pilkas tonuotas</option>
                        <option value="papildomasGs">Papildomas Gs</option>
                    </select>

                    <div id="papildomasGs-info" style="display:none;">
                        <label for="papildomasGs-comment">Gs komentaras:</label>
                        <input type="text" name="papildomasGs-comment" id="papildomasGs-comment">
                    </div>

                    <script>
                        // Get the dropdown and papildomasGs-info div
                        var gs = document.getElementById("gs");
                        var papildomasGsInfo = document.getElementById("papildomasGs-info");

                        // Add event listener to show/hide papildomasGs-info div
                        gs.addEventListener("change", function () {
                            if (gs.value === "papildomasGs") {
                                papildomasGsInfo.style.display = "block";
                            } else {
                                papildomasGsInfo.style.display = "none";
                            }
                        });
                    </script>
                    <br>
                    <label for="atramu-tvirtinimo-tipas">Atramu tvirtinimo tipas:</label>
                    <select name="atramu-tvirtinimo-tipas" id="atramu-tvirtinimo-tipas">
                        <option value="betonuojamas">Betonuojamas</option>
                        <option value="prisukamas">Prisukamas</option>
                        <option value="papildomasAtramuTvirtinimoTipas">Papildomas tvirtinimo tipas</option>
                    </select>
                    <div id="papildomas-atramu-tvirtinimo-tipas-info" style="display:none;">
                        <label for="papildomas-atramu-tvirtinimo-tipas-comment">Atramu tvirtinimo tipo
                            komentaras:</label>
                        <input type="text" name="papildomas-atramu-tvirtinimo-tipas-comment"
                               id="papildomas-atramu-tvirtinimo-tipas-comment">
                    </div>
                    <script>
                        // Get the dropdown and papildomas-atramu-tvirtinimo-tipas-info div
                        var atramuTvirtinimoTipas = document.getElementById("atramu-tvirtinimo-tipas");
                        var papildomasAtramuTvirtinimoTipasInfo = document.getElementById("papildomas-atramu-tvirtinimo-tipas-info");

                        // Add event listener to show/hide papildomas-atramu-tvirtinimo-tipas-info div
                        atramuTvirtinimoTipas.addEventListener("change", function () {
                            if (atramuTvirtinimoTipas.value === "papildomasAtramuTvirtinimoTipas") {
                                papildomasAtramuTvirtinimoTipasInfo.style.display = "block";
                            } else {
                                papildomasAtramuTvirtinimoTipasInfo.style.display = "none";
                            }
                        });
                    </script>
                    <br>
                    <label for="atmetimai">Atmetimai:</label>
                    <select name="atmetimai" id="atmetimai">
                        <option value="Reikia">Reikia</option>
                        <option value="Nereikia">Nereikia</option>
                    </select>
                    <br>
                    <label for="dangteliai">Dangteliai:</label>
                    <select name="dangteliai" id="dangteliai">
                        <option value="Aliuminio">Aliuminio</option>
                        <option value="Gumos">Gumos</option>
                    </select>
                    <br>
                    <label for="atramusSkaicius">atramusSkaicius:</label>
                    <input type="text" name="atramusSkaicius" id="atramusSkaicius"
                           value="{{ $formData['atramusSkaicius'] ?? '' }}">
                    <br>
                    <label for="namoSiena">namoSiena:</label>
                    <input type="text" name="namoSiena" id="namoSiena" value="{{ $formData['namoSiena'] ?? '' }}">
                    <br>
                    <label for="grindinioTipas">grindinioTipas:</label>
                    <input type="text" name="grindinioTipas" id="grindinioTipas"
                           value="{{ $formData['grindinioTipas'] ?? '' }}">
                    <br>
                    <label for="papildomiDarbai">papildomiDarbai:</label>
                    <input type="text" name="papildomiDarbai" id="papildomiDarbai"
                           value="{{ $formData['papildomiDarbai'] ?? '' }}">
                </div>
            </div>
            <div class="row">
                <label for="h1">h1:</label>
                <input type="text" name="h1" id="h1"
                       value="{{ $formData['h1'] ?? '' }}">
                <label for="h2">h2:</label>
                <input type="text" name="h2" id="h2"
                       value="{{ $formData['h2'] ?? '' }}">
                <label for="w">w:</label>
                <input type="text" name="w" id="w"
                       value="{{ $formData['w'] ?? '' }}">
                <label for="l">l:</label>
                <input type="text" name="l" id="l"
                       value="{{ $formData['l'] ?? '' }}">
            </div>


            <button type="submit">Atnaujinti</button>
        </form>
    </div>

    <div class="col-6 pdf-preview-container">
        <iframe name="pdf-preview" src="" frameborder="0" width="100%" height="100%"></iframe>
    </div>
</div>


