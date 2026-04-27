import Link from 'next/link';

export default function NotFound() {
  return (
    <main className="container mx-auto px-4 py-24 text-center">
      <h1 className="text-6xl font-bold">404</h1>
      <p className="mt-4 text-lg">Page introuvable.</p>
      <Link href="/" className="mt-8 inline-block underline">
        Retour à l'accueil
      </Link>
    </main>
  );
}
