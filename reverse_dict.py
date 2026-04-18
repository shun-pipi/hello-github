def reverse_dict(d):
    try:
        return {v: k for k, v in d.items()}
    except Exception:
        return None
