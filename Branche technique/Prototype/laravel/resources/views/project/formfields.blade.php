<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Projet</h3>
    </div>
    <form>
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
</div>


{{--
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($project) ? 'Edit Project' : 'Add Project' }}</h3>
    </div>
    <form method="POST" action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}">
        @csrf
        @if (isset($project))
            @method('PUT')
        @endif
        <div class="card-body">
            <!-- Form fields (same as before) -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($project) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>
--}}
