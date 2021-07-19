<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All Categories</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger">
                                <strong>{{session('error_message')}}</strong>
                            </div>
                        @elseif (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>{{session('success_message')}}</strong>
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" required placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                </div>
                            </div>
                            <div class="form-group" wire:keyup="generateSlug">
                                <label for="" class="col-md-4 control-label" >Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="slug">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
