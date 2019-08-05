<form action="{{route('application')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="text" name="division" placeholder="division">
    <input type="text" name="department" placeholder="department">
    <input type="text" name="role" placeholder="role">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="password">
    <input type="submit" value="submit">
</form>