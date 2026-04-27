'use client';

export default function Error({
  error,
  reset,
}: {
  error: Error & { digest?: string };
  reset: () => void;
}) {
  return (
    <main className="container mx-auto px-4 py-24 text-center">
      <h1 className="text-3xl font-bold">Une erreur est survenue</h1>
      <p className="mt-4 text-muted-foreground">{error.message}</p>
      <button
        onClick={reset}
        className="mt-8 rounded bg-primary px-4 py-2 text-primary-foreground"
      >
        Réessayer
      </button>
    </main>
  );
}
