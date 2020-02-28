<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Create your Post Now...</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('createPost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Whats on Your Mind???</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" type="text"
                            name="post"></textarea>
                    </div>
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>