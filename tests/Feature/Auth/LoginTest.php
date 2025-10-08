<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test("guests can view the login page", function () {
    $response = $this->get(route("login"));

    $response->assertStatus(200)->assertViewIs("pages.login");
});

test(
    "authenticated users are redirected to dashboard from login page",
    function () {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route("login"));
        $response->assertRedirect(route("dashboard"));
    },
);

test("users can login with valid credentials", function () {
    $user = User::factory()->create([
        "email" => "test@example.com",
        "password" => Hash::make("password123"),
    ]);

    $response = $this->post(route("login"), [
        "email" => "test@example.com",
        "password" => "password123",
    ]);

    $response->assertRedirect(route("dashboard"));
    $this->assertAuthenticatedAs($user);
});

test("users cannot login with invalid email", function () {
    User::factory()->create([
        "email" => "test@example.com",
        "password" => Hash::make("password123"),
    ]);

    $response = $this->post(route("login"), [
        "email" => "wrong@example.com",
        "password" => "password123",
    ]);

    $response->assertSessionHasErrors("login");
    $this->assertGuest();
});

test("users cannot login with invalid password", function () {
    User::factory()->create([
        "email" => "test@example.com",
        "password" => Hash::make("password123"),
    ]);

    $response = $this->post(route("login"), [
        "email" => "test@example.com",
        "password" => "wrongpassword",
    ]);

    $response->assertSessionHasErrors("login");
    $this->assertGuest();
});

test("login requires email", function () {
    $response = $this->post(route("login"), [
        "password" => "password123",
    ]);

    $response->assertSessionHasErrors("email");
    $this->assertGuest();
});

test("login requires password", function () {
    $response = $this->post(route("login"), [
        "email" => "test@example.com",
    ]);

    $response->assertSessionHasErrors("password");
    $this->assertGuest();
});

test("email must be valid format", function () {
    $response = $this->post(route("login"), [
        "email" => "not-an-email",
        "password" => "password123",
    ]);

    $response->assertSessionHasErrors("email");
    $this->assertGuest();
});

test("session is regenerated after successful login", function () {
    $user = User::factory()->create([
        "email" => "test@example.com",
        "password" => Hash::make("password123"),
    ]);

    $this->post(route("login"), [
        "email" => "test@example.com",
        "password" => "password123",
    ]);

    $this->assertAuthenticatedAs($user);
});

test(
    "authenticated users are redirected to dashboard when trying to login",
    function () {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route("login"), [
            "email" => $user->email,
            "password" => "password",
        ]);

        $response->assertRedirect(route("dashboard"));
    },
);

test("failed login returns to login page with email preserved", function () {
    User::factory()->create([
        "email" => "test@example.com",
        "password" => Hash::make("password123"),
    ]);

    $response = $this->post(route("login"), [
        "email" => "test@example.com",
        "password" => "wrongpassword",
    ]);

    $response->assertRedirect();
    $response->assertSessionHasInput("email", "test@example.com");
    $response->assertSessionMissing("password");
});
