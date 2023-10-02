<table>
    <tr>
        <th>user_id</th>
        <th>content</th>
        <th>image_path</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>name </th>
        <th>username </th>
        <th>image</th>
        <th>comment.user_id </th>
        <th>comment.post_id </th>
        <th>comment.content </th>
        <th>comment.user_id.username </th>
        <th>comment.user_id.image </th>
        
    </tr>
   
    @foreach ($posts as $allpost)
    <tr>
    <td>{{ $allpost->user_id }}</td>
    <td>{{ $allpost->content }}</td>
    <td>{{ $allpost->image_path }}</td>
    <td>{{ $allpost->created_at }}</td>
    <td>{{ $allpost->updated_at }}</td>
    <td>{{ $allpost->user->name }}</td>
    <td>{{ $allpost->user->username }}</td>
    <td>{{ $allpost->user->image }}</td>

    @foreach ($allpost->comment as $comment)
    <td>{{ $comment->user_id}} </td>
    <td>{{ $comment->post_id}} </td>
    <td>{{ $comment->content}} </td>
    </tr>
    @endforeach
    @endforeach
</table>