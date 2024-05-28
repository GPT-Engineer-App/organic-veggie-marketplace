<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Vegetables</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $product->image; ?>" class="card-img-top" alt="<?php echo $product->name; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product->name; ?></h5>
                            <p class="card-text"><?php echo $product->description; ?></p>
                            <p class="card-text">$<?php echo $product->price; ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="<?php echo site_url('products/like/'.$product->id); ?>" class="btn btn-outline-primary">
                                    <i class="fa fa-thumbs-up"></i> <?php echo $product->likes; ?>
                                </a>
                                <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#commentModal<?php echo $product->id; ?>">
                                    <i class="fa fa-comments"></i> <?php echo $product->comments; ?>
                                </button>
                                <button class="btn btn-outline-success" data-toggle="modal" data-target="#buyModal<?php echo $product->id; ?>">
                                    <i class="fa fa-shopping-basket"></i> Buy
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment Modal -->
                <div class="modal fade" id="commentModal<?php echo $product->id; ?>" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url('products/comment/'.$product->id); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Buy Modal -->
                <div class="modal fade" id="buyModal<?php echo $product->id; ?>" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="buyModalLabel">Buy Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url('products/buy/'.$product->id); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Buy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>