<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Description</th>
        <th>imgIdle</th>
        <th>imgRun</th>
        <th>imgJump</th>
        <th>imgFall</th>
        <th>imgIdleLeft</th>
        <th>imgRunLeft</th>
        <th>imgJumpLeft</th>
        <th>imgFallLeft</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
    <tbody>
    <?php@foreach($sprites as $sprite)
        <tr>
            <td>{{ $sprite->id }}</td>
            <td>{{ $sprite->description }}</td>
            <td>{{ $sprite->imgIdle }}</td>
            <td>{{ $sprite->imgRun }}</td>
            <td>{{ $sprite->imgJump }}</td>
            <td>{{ $sprite->imgFall }}</td>
            <td>{{ $sprite->imgIdleLeft }}</td>
            <td>{{ $sprite->imgRunLeft }}</td>
            <td>{{ $sprite->imgJumpLeft }}</td>
            <td>{{ $sprite->imgFallLeft }}</td>
            <td>{{ $sprite->created_at }}</td>
            <td>{{ $sprite->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
