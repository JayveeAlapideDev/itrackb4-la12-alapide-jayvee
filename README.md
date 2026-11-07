
QUESTIONS

G1. Route model binding needs the controller parameter type-hinted with an Eloquent model and its variable name to match the route wildcard; with only the type-hint, Laravel injects a blank model instead of looking one up, and with only the matching name, you just get the raw string from the URL.

G2. The Delete link opened the detail page because a plain <a> link sends a GET request, and the delete route only accepts DELETE, so the only matching route was show.

G3. Without the second argument the edit form’s fields start empty instead of showing the saved values, and with only the second value the form loads correctly but wipes whatever the user typed whenever validation fails and redirects back
