{{-- <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Projet</h3>
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="nom" type="text" class="form-control" id="nom" placeholder="Enter nom">
            </div>

            <div class="form-group">
                <label for="Description">Description</label>
                <input name="description" type="text" class="form-control" id="Description"
                    placeholder="Description">
            </div>

            <div class="form-group">
                <label for="date">date debut</label>
                <input name="startDate" type="date" class="form-control" id="date" placeholder="date debut">
            </div>

            <div class="form-group">
                <label for="date">date fin</label>
                <input name="endtDate" type="date" class="form-control" id="date" placeholder="date fin">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div> --}}



<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($project) ? 'Edit Project' : 'Add Project' }}</h3>
    </div>
    <form method="POST" action="{{ isset($project) ? route('project.update', $project->id) : route('project.store') }}">
        @csrf
        @if (isset($project))
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="name" type="text" class="form-control" id="nom" placeholder="Enter nom"
                    value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="text-danger mb-0">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2 mb-0">
                <label for="Description">Description</label>
                <input name="description" type="text" class="form-control" id="Description" placeholder="Description"
                    value="{{ old('description') }}">
            </div>
            @error('description')
                <div class="text-danger ">{{ $message }}</div>
            @enderror
            <div class="form-group mt-3 ">
                <label for="date">date debut</label>
                <input name="startDate" type="date" class="form-control" id="date" placeholder="date debut"
                    value="{{ old('startDate') }}">
            </div>
            @error('startDate')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group ">
                <label for="date">date fin</label>
                <input name="endDate" type="date" class="form-control" id="date" placeholder="date fin"
                    value="{{ old('endDate') }}">
            </div>
            @error('endDate')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="card-footer">
            <a href="{{ route('project.index') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary mx-2">{{ isset($project) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>
