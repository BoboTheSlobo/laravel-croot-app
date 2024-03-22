@foreach ($news as $newsItem)
    <tr>
        <td>{{ $newsItem->id }}</td>
        <td>{{ $newsItem->title }}</td>
        <td>{{ $newsItem->description }}</td>
        <td><img src="{{ asset($newsItem->image) }}" alt="News Image" style="max-width: 100px;"></td>
        <td>{{ $newsItem->status ? 'Active' : 'Inactive' }}</td>
        <td>
            <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
