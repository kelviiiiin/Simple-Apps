# Toralizer

**Toralizer** is a command-line utility designed to force applications to route their network traffic through the TOR network.

By utilizing the dynamic linker's `LD_PRELOAD` environment variable, Toralizer intercepts standard network `connect()` calls at runtime. It then seamlessly redirects that TCP traffic through a localized TOR proxy using the SOCKS v4 protocol, drastically enhancing user privacy.

> [!WARNING]
> **DNS Leak Notice:** DNS traffic is currently **not** routed via the proxy. UDP-based resolution requests will bypass Toralizer and go through your default network path.

---

## File Structure

The expected installation path for this application is:

```text
~/Simple-Apps/cliApps/App0
```

---

## Installation & Build

Follow these steps to compile the application from the source directory:

1. **Clone the repository** to your local machine.
2. **Navigate** into the application workspace:

   ```bash
   cd ~/Simple-Apps/cliApps/App0
   ```

3. **Compile** the shared library object (`toralize.so`):

   ```bash
   make
   ```

---

## Usage

To use Toralizer transparently across other shell utilities, create a helper wrapper script (e.g., `toralize`) with the following content:

```bash
#!/bin/bash

# Inject the hooked shared library
export LD_PRELOAD=~/Simple-Apps/cliApps/App0/toralize.so

# Execute the targeted application with its arguments
"${@}"

# Clean up the environment variable afterward
unset LD_PRELOAD
```

### Quick Example

Once your script is saved and made executable (`chmod +x toralize`), you can force tools like `curl` to run through the proxy:

```bash
./toralize curl https://check.torproject.org
```
