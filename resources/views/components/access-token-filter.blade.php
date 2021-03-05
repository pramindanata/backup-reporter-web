<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header">
        <div class="card-title">Filter</div>
    </div>

    <div class="card-body">
        <form action="{{ route('access-tokens.index') }}" method="get">
            <div class="row gy-3">
                <div class="col-md-6 col-xl-3">
                    <x-base.form-group label="Search" for="input-search">
                        <input id="input-search" type="text" name="search" class="form-control" />
                    </x-base.form-group>
                </div>

                <div class="col-md-6 col-xl-3">
                    <x-base.form-group label="Order By" for="input-order">
                        <select id="select-order" name="order" class="form-control">
                            <option disabled selected value>Select</option>
                            <option value="name">Name</option>
                            <option value="created_at">Created At</option>
                        </select>
                    </x-base.form-group>
                </div>

                <div class="col-md-6 col-xl-3">
                    <x-base.form-group label="Sort By" for="select-order">
                        <select id="select-sort" name="sort" class="form-control">
                            <option disabled selected value>Select</option>
                            <option value="ASC">Ascending</option>
                            <option value="DESC">Descending</option>
                        </select>
                    </x-base.form-group>
                </div>

                <div class="col-md-6 col-xl-3 d-flex align-items-end">
                    <div class="flex-fill">
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary flex-grow-1">Apply</button>
                            <button type="button" id="btn-reset" class="btn flex-grow-1">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
