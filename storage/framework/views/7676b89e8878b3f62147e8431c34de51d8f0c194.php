

<?php $__env->startSection('styles'); ?>
<style>
          #outer
        {
            width:auto;
            text-align: center;
        }
        .inner
        {
            display: inline-block;
        }
</style>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">


                  <?php if(Session::has('alert-success')): ?>

                        <div class="alert alert-success" role="alert">
                        <?php echo e(session::get('alert-success')); ?>

                        </div>
                <?php endif; ?>

                
                <?php if(Session::has('alert-info')): ?>

                <div class="alert alert-info" role="alert">
                <?php echo e(session::get('alert-info')); ?>

                </div>
               <?php endif; ?>


                <?php if(Session::has('error')): ?>

                <div class="alert alert-danger" role="alert">
                <?php echo e(session::get('error')); ?>

                </div>
               <?php endif; ?>

               <a class="btn btn-sm btn-info"href="<?php echo e(route('todo.create')); ?>">Create New Todo</a>

                    <?php if(count($todos)> 0): ?>

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Completed</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                          <td><?php echo e($todo->title); ?></td>
                          <td><?php echo e($todo->description); ?></td>
                          <td>
                            <?php if($todo ->is_completed == 1): ?>
                                <a class="btn btn-sm btn-success" href="">Completed</a>
                              
                                <?php else: ?> 
                                <a class="btn btn-sm btn-danger" href="">In-completed</a>
                            <?php endif; ?>
                              
                                                
                          </td>
                        
                          <td id="outer">
                            <a class=" inner btn btn-sm btn-success" href="<?php echo e(route('todo.show', $todo->id)); ?>">View</a>
                            <a class=" inner btn btn-sm btn-info" href="<?php echo e(route('todo.edit', $todo->id)); ?>">Edit</a>
                            <form method="post"   action ="<?php echo e(route('todo.ddestroy')); ?>" class="inner">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('delete'); ?>
                              <input type="hidden" name="todo_id" value="<?php echo e($todo->id); ?>">
                              <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                          </td>
                        </tr>
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                      </tbody>
                    </table>


                    <?php else: ?>

                    <h4>No Todos are Created yet</h4>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Todo-App\resources\views/todo/index.blade.php ENDPATH**/ ?>