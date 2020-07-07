<tbody>
@foreach($cars as $car)
    <tr data-car-id="{{ $car->id }}">
        <td>{{ $car->name }}</td>
        <td>{{ $car->brand->name }}</td>
        <td>{{ $car->api_code }}</td>
        <td>{{ $car->gov_number }}</td>
        <td>{{ $car->vin_number }}</td>
        <td>{{ $car->year }}</td>
        <td style="height: 1%; background-color: {{ $car->color }}"></td>
        <td>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button"
                        id="dropdownItemActions" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    {{ __('dashboard.general.forms.actions') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownItemActions">
                    <form method="POST"
                          action="{{ route('cars.destroy', [
                                        'locale' => app()->getLocale(),
                                        'car' => $car,
                                    ]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                                name="id"
                                onclick="callConfirmModal(this)"
                                data-title="{{ __('dashboard.general.forms.confirm') }}"
                                data-cancel="{{ __('dashboard.general.forms.cancel') }}"
                                data-confirm="{{ __('dashboard.general.forms.ok') }}"
                                class="dropdown-item">
                            {{ __('dashboard.cars.CRUD.delete') }}
                        </button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
@endforeach
</tbody>

@section('pagination')
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            {{ $cars->links('dashboard.pagination') }}
        </div>
    </div>
@endsection
