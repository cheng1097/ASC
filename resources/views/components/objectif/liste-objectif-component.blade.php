<style>
    /* Style pour les groupes pairs */
    .group-row.group-even,
    .details-row.group-even {
        background-color: #e3f2fd !important;
        /* Bleu très clair */
    }

    /* Style pour les groupes impairs */
    .group-row.group-odd,
    .details-row.group-odd {
        background-color: #ffffff !important;
        /* Blanc */
    }

    /* Style pour l'en-tête de groupe */
    .group-row {
        cursor: pointer;
        border-top: 2px solid #dee2e6;
    }

    /* Hover effect */
    .group-row:hover,
    .details-row:hover {
        background-color: #f5f5f5 !important;
    }

    .toggle-icon {
        transition: transform 0.3s;
    }

    .collapsed .toggle-icon {
        transform: rotate(-90deg);
    }
</style>


@php
    $route = $route_collecte ?? ($route_validation_n1 ?? ($route_validation_n2 ?? ''));
@endphp



<table class="table table-hover datatable">
    <thead class="table-dark">
        <tr>
            <th width="5%">#</th>
            <th width="20%">Enquêteurs</th>
            <th width="15%">Ouvrages</th>
            <th width="15%">Qté {{ url_() !== 'objectifs' ? 'à collecter' : '' }}</th>
            @if (url_() !== 'objectifs')
                <th width="15%">Qté Collectées</th>
            @endif
            @if (url_tab(1) == 'validation-n1' || url_tab(1) == 'validation-n2')
                <th width="15%">Validées N1</th>
            @endif
            @if ((url_tab(1) == 'validation-n2' && _user('role') == 'superviseur') || (_user('role') == 'admin' && url_() !== 'objectifs' ) )
                <th width="20%">Validées N2</th>
            @endif
            @if (url_() == 'objectifs')
                <th width="40%" class="text-center">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @php
            if (url_() == 'collecte') {
                $colspan = 5;
            } elseif (url_tab(1) == 'validation-n1') {
                $colspan = 6;
            } elseif (url_tab(1) == 'validation-n2') {
                $colspan = 7;
            } else {
                $colspan = 5;
            }
        @endphp
        @foreach ($enqueteurs as $key => $enqueteur)
            <tr class="group-row group-{{ $key % 2 == 0 ? 'even' : 'odd' }} active"
                data-enqueteur="{{ $enqueteur->id }}">
                <td colspan="{{ $colspan }}">
                    <i class="ri-arrow-down-s-line toggle-icon me-2"></i>
                    <strong>{{ $key + 1 }}. {{ $enqueteur->nom }}</strong>
                </td>
            </tr>
    <tbody class="form-body" id="form-body-{{ $enqueteur->id }}">
        <form id="form-{{ $enqueteur->id }}" method="POST" action="{{ $route }}">
            @csrf
            @foreach ($enqueteur->objectifs as $index => $objectif)
                <tr class="details-row group-{{ $key % 2 == 0 ? 'even' : 'odd' }}">
                    <td></td>
                    <td></td>
                    <td>{{ $objectif->ouvrage->libelle }}</td>
                    <td>{{ $objectif->objectif }}</td>
                    @if (url_() !== 'objectifs')
                        <td>
                            <input type="number" min="0"
                                class="form-control
                            @if (getQuantiteEnqueteur($objectif->id) == 0) 
                            @elseif ($objectif->objectif > getQuantiteEnqueteur($objectif->id))
                                bg-danger text-white
                            @elseif ($objectif->objectif <= getQuantiteEnqueteur($objectif->id))
                                bg-success text-white @endif

                            "
                                name="quantite_enqueteur[{{ $objectif->id }}]"
                                value="{{ getQuantiteEnqueteur($objectif->id) ?? '' }}"
                                @if ((isset($option3) && $option3 == 'v-superviseur') || (isset($option2) && $option2 == 'v-controleur')) disabled @endif>
                        </td>
                    @endif
                    @if (url_tab(1) == 'validation-n1' || url_tab(1) == 'validation-n2')
                        <td>
                            <input type="number" min="0"
                                class="form-control
                            @if (getQuantiteControleur($objectif->id) == 0)
                               
                            @elseif (getQuantiteControleur($objectif->id) < getQuantiteEnqueteur($objectif->id))
                                bg-danger text-white
                            @elseif (getQuantiteControleur($objectif->id) >= getQuantiteEnqueteur($objectif->id))
                                bg-success text-white
                            @endif

                            "
                                name="quantite_controleur[{{ $objectif->id }}]"
                                value="{{ getQuantiteControleur($objectif->id) ?? '' }}"
                                @if (isset($option3) && $option3 == 'v-superviseur') disabled @endif>
                        </td>
                        @if ((url_tab(1) == 'validation-n2' && _user('role') == 'superviseur') || _user('role') == 'admin' )
                            <td>
                                <input type="number" min="0"
                                    class="form-control
                               @if (getQuantiteSuperviseur($objectif->id) == 0)
                                    
                                @elseif (getQuantiteSuperviseur($objectif->id) < getQuantiteControleur($objectif->id))
                                    bg-danger text-white
                                @elseif (getQuantiteSuperviseur($objectif->id) >= getQuantiteControleur($objectif->id))
                                    bg-success text-white
                                @endif

                                "
                                    value="{{ getQuantiteSuperviseur($objectif->id) ?? '' }}"
                                    name="quantite_superviseur[{{ $objectif->id }}]">
                            </td>
                        @endif
                    @endif
                    @if (url_() == 'objectifs')
                        <td class="text-center">
                            @include('components.objectif.action-objectif')
                        </td>
                    @endif
                </tr>
            @endforeach
            <tr>
                <td colspan="{{ $colspan }}" class="text-end">
                    @if($enqueteur->objectifs->count() == 1 && url_() !== 'objectifs' )
                    <button type="button" class="btn btn-primary btn-sm submit-form"
                        data-form-id="{{ $enqueteur->id }}">
                        <i class="ri-save-line me-1"></i>Enregistrer
                    </button>
                    @endif
                </td>
                <td></td>
            </tr>
        </form>
    </tbody>
    @endforeach
    </tbody>
</table>

<style>
    .group-row {
        cursor: pointer;
    }

    .group-row .toggle-icon {
        transition: transform 0.3s ease;
    }

    .group-row.active .toggle-icon {
        transform: rotate(180deg);
    }

    .btn-primary {
        padding: 0.4rem 1rem;
        font-size: 0.875rem;
    }

    .btn-primary:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion de l'affichage/masquage
        const groupRows = document.querySelectorAll('.group-row');

        groupRows.forEach(row => {
            row.addEventListener('click', function() {
                const enqueteurId = this.dataset.enqueteur;
                const formBody = document.getElementById('form-body-' + enqueteurId);

                // Toggle l'affichage du formulaire
                if (formBody) {
                    formBody.style.display = formBody.style.display === 'none' ?
                        'table-row-group' : 'none';
                    this.classList.toggle('active');
                }
            });
        });

        // Gestion de la soumission des formulaires
        const submitButtons = document.querySelectorAll('.submit-form');

        submitButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Récupérer l'ID du formulaire à partir du data-attribute
                const formId = this.getAttribute('data-form-id');
                const form = document.getElementById('form-' + formId);

                if (form) {
                    // Désactiver le bouton pendant la soumission
                    this.disabled = true;
                    this.innerHTML = '<i class="ri-loader-4-line me-1"></i>Envoi...';

                    // Soumettre le formulaire
                    form.submit();
                }
            });
        });
    });
</script>
